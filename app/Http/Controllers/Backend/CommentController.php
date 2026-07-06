<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        if (is_null($this->user) || !$this->user->can('comment.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any comment!');
        }
        $comments = Comment::all();
        return view('backend.pages.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Comment $comment)
    {
        return view('backend.pages.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->body = $request->body;
        $comment->status = $request->status;
        $comment->save();
        Alert::success('Updated', 'Comment successfully updated');
        return redirect()
            ->route('admin.comments.index', compact('comment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        Alert::success('Deleted', 'Successfully deleted.');
        return back();
    }

    public function deleteSelected(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('comment.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete comment !');
        }
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'No comment selected for deletion.');
        }

        Comment::whereIn('id', $ids)->delete();
        Alert::success('Deleted', 'Comment deleted successfully.');
        return redirect()->back()->with('success', 'Selected Comment have been deleted!');
    }
}
