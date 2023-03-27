<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function store(Request $request)
    {

        $validated = $request->validate([
            'post_id'=>'required',
            'my_content'=>'required|min:20',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->id();
        $comment->content = $request->my_content;
        $comment->save();


        $request->session()->flash('message','تم نشر التعليق بنجاح');
        return redirect()->back();
    }




    public function destroy($id)
    {
        $comment = Comment::find($id)->delete();
        return redirect()->back();
    }
}
