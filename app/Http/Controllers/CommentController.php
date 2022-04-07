<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Write Your Code..
     *
     * @return string
    */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'body'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return back();
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('posts.show',$comment->post_id)->with('success', 'Comment Deleted');
    }
}
