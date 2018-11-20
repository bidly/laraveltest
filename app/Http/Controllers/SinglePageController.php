<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comments;

class SinglePageController extends Controller
{
    public function getSingle($slug){

        $post = DB::table('films')->where('slug', $slug)->first();

        $postsid= DB::table('films')->where('slug', $slug)->value('id');
        $comments= DB::table('comments')->where('post_id', $postsid)->get();



        return view('single',['comments' => $comments, 'post' => $post]);
    }
    public function postComment(Request $request){
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new Comments;
        $comment->post_id = $request->input('post_id');
        $comment->comment= $request->input('comment');
        $comment->user = $request->input('user');
        $comment->save();

        return redirect('/')->with('info', 'Article Saved Successfully');

        return 'Validation Pass';

    }


}
