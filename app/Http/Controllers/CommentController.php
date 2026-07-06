<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Comment;
   
class CommentController extends Controller
{
    /**
     * Store a newly  created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            
            'body'=>'required',
        ]);
   
        $input = $request->all();

        Comment::create($input);
   
        return redirect()->back();
    }


    public function update(Request $request,Comment $comment)
    {
        $update = [
            'status' => $request->status,
        ];
         $comment->update($update);
        return redirect()->back();
    }
}