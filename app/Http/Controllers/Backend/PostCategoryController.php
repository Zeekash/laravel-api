<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PostCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('post-category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any post category !');
        }
        $post_category = PostCategory::all();
        return view('backend.pages.post-categories.index', compact('post_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('post-category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any post category !');
        }
        return view('backend.pages.post-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        PostCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->input('name')),
        ]);
        Alert::success('Created', 'Post category successfully created.');
        return redirect()
            ->route('admin.post-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $post_category)
    {
        if (is_null($this->user) || !$this->user->can('post-category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any post category !');
        }
        return view('backend.pages.post-categories.edit', compact('post_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $post_category)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $post_category->name = $request->name;
        $post_category->slug = Str::slug($request->input('name'));
        $post_category->save();
        toast('Post category successfully updated!', 'success');

        return redirect()
            ->route('admin.post-categories.index', compact('post_category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $post_category)
    {
        if (is_null($this->user) || !$this->user->can('post-category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any post category !');
        }
        $post_category->delete();
        Alert::success('Deleted', 'Post category deleted successfully .');
        return redirect()
            ->route('admin.post-categories.index');
    }
    public function deleteSelected(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('post-category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete post category !');
        }
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'No post category selected for deletion.');
        }

        PostCategory::whereIn('id', $ids)->delete();
        Alert::success('Deleted', 'Post Category deleted successfully.');
        return redirect()->back()->with('success', 'Selected Post Category have been deleted!');
    }
}
