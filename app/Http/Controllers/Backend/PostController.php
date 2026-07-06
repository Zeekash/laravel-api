<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('post.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any post !');
        }
        $posts = Post::all();
        $categories = PostCategory::get(['name', 'id']);
        $trashedCount = Post::onlyTrashed()->count();
        return view('backend.pages.posts.index', compact('posts', 'categories', 'trashedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('post.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any post !');
        }
        $categories = PostCategory::get(['name', 'id']);
        return view('backend.pages.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('post.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any post !');
        }
        $request->validate([
            'post_category_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'published_at' => 'nullable|date',
        ]);

        $publishedAt = $request->published_at ? Carbon::parse($request->published_at) : now();

        $post = new Post();
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->slug);
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->body = $request->body;
        $post->post_category_id = $request->post_category_id;
        $post->img_alt = Str::slug($request->img_alt);
        $post->description = $request->description;
        $post->published_at  =  $publishedAt;

        if ($files = $request->file('image')) {
            $destinationPath = 'public/posts/image/'; // upload path
            $profileImage = Str::slug($request->title) . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";
        }

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('post.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any post !');
        }
        $post = Post::find($id);
        return view('backend.pages.posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        if (is_null($this->user) || !$this->user->can('post.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any post!');
        }
        $selectedCategoryId = $post->post_category_id;
        $categories = PostCategory::get(['name', 'id']);
        return view('backend.pages.posts.edit', compact('post', 'categories', 'selectedCategoryId'));
    }
    public function update(Request $request, Post $post)
    {
        if (is_null($this->user) || !$this->user->can('post.view')) {
            abort(403, 'Sorry !! You are Unauthorized to update this post!');
        }
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'published_at' => 'nullable|date',
            'status' => 'nullable|in:published,draft,scheduled',
        ]);
        $oldImagePath = $post->image;
        $post->title = $request->title;
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->body = $request->body;
        $post->post_category_id = $request->post_category_id;
        $post->description = $request->description;
        $post->slug = Str::slug($request->slug);
        $post->img_alt = Str::slug($request->img_alt);

        switch ($request->status) {
            case 'published':
                $post->is_published = true;
                $post->published_at = $request->published_at ? Carbon::parse($request->published_at) : now();
                break;
            case 'scheduled':
                $post->is_published = false;
                $post->published_at = $request->published_at ? Carbon::parse($request->published_at) : now();
                break;
            default:
                $post->is_published = false;
                $post->published_at = null;
                break;
        }

        if ($files = $request->file('image')) {

            // Delete old image
            if ($oldImagePath && file_exists(public_path('posts/image/' . $oldImagePath))) {
                unlink(public_path('posts/image/' . $oldImagePath));
            }

            // Upload new image
            $destinationPath = public_path('posts/image/');
            $profileImage = Str::slug($request->title) . '-' . time() . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $post->image = $profileImage;
        }
        $post->save();
        toast('Company successfully updated!', 'success');

        return redirect()
            ->route('admin.posts.index', compact('post'));
    }

    public function destroy(Post $post)
    {
        if (is_null($this->user) || !$this->user->can('post.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any post !');
        }
        $post->deleted_by_id = auth()->guard('admin')->id();
        $post->restored_by_id = null;
        $post->save();
        $post->delete();
        Alert::success('Deleted', 'Post deleted successfully.');
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }

    public function deleteAll(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('post.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any post !');
        }

        $ids = array_filter(explode(',', (string) $request->ids));
        if (empty($ids)) {
            return response()->json(['error' => 'Please select at least one post.']);
        }

        $posts = Post::whereIn('id', $ids)->get();

        foreach ($posts as $post) {
            $post->deleted_by_id = Auth::guard('admin')->id();
            $post->restored_by_id = null;
            $post->save();
            $post->delete();
        }

        return response()->json(['success' => 'Selected posts deleted successfully.']);
    }


    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('post.view-trash')) {
            abort(403, 'Sorry !! You are Unauthorized to view trashed posts!');
        }
        $posts = Post::onlyTrashed()->with('deletedBy')->orderBy('deleted_at', 'desc')->get();
        return view('backend.pages.posts.trashed', compact('posts'));
    }

    public function restore($id)
    {
        if (is_null($this->user) || !$this->user->can('post.restore')) {
            abort(403, 'Sorry !! You are Unauthorized to restore this post!');
        }
        $post = Post::withTrashed()->findOrFail($id);
        $post->restored_by_id = auth()->guard('admin')->id();
        $post->deleted_by_id = null;
        $post->save();
        $post->restore();
        Alert::success('Restored', 'Post restored successfully.');
        return back()->with('success', 'Post restored successfully.');
    }

    public function forceDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('post.force-delete')) {
            abort(403, 'Sorry !! You are Unauthorized to force delete posts!');
        }
        $post = Post::withTrashed()->findOrFail($id);
        $imagePath = $post->image;
        if ($imagePath && file_exists(public_path('posts/image/' . $imagePath))) {
            unlink(public_path('posts/image/' . $imagePath));
        }
        $post->forceDelete();
        Alert::success('Deleted', 'Post deleted permanently.');
        return back()->with('success', 'Post deleted permanently.');
    }
}
