<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PostFaqController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('post-faq.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any post faq!');
        }
        $post_faqs = PostFaq::all();
        return view('backend.pages.post-faq.index', compact('post_faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('post-faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any post faq!');
        }
        $posts = Post::get(['id', 'title']);
        return view('backend.pages.post-faq.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'inputs.*.question' => 'required',
                'inputs.*.answer' => 'required',
                'inputs.*.post_id' => 'required'
            ],
            [
                'inputs.*.question' => 'The question field is required!',
                'inputs.*.answer' => 'The answer field is required!',
                'inputs.*.post_id' => 'The post field is required!',
            ]
        );
        foreach ($request->inputs as $key => $value) {
            PostFaq::create($value);
        }
        return redirect()->route('admin.post-faq.index')->with('success', 'Added Successfully');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostFaq $postFaq)
    {
        if (is_null($this->user) || !$this->user->can('post-faq.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any post faq!');
        }
        $posts = Post::get(['id', 'title']);
        return view('backend.pages.post-faq.edit', compact('postFaq', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostFaq $postFaq)
    {
        $request->validate([
            'post_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $postFaq->post_id = $request->post_id;
        $postFaq->question = $request->question;
        $postFaq->answer = $request->answer;
        $postFaq->save();
        return redirect()->route('admin.post-faq.index')->with('success', 'Faq Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('post-faq.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any post faq!');
        }
        $postFaq = PostFaq::find($id);
        $postFaq->delete();
        Alert::success('Deleted', 'Post Faq deleted successfully .');

        return redirect()->route('admin.post-faq.index')->with('success', 'Deleted Successfully');
    }

    public function deleteSelected(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('post-faq.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete post faq !');
        }
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'No post faq selected for deletion.');
        }

        PostFaq::whereIn('id', $ids)->delete();
        Alert::success('Deleted', 'Post Faq deleted successfully.');
        return redirect()->back()->with('success', 'Selected Post Faq have been deleted!');
    }
}
