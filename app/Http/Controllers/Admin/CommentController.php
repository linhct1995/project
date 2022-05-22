<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $req)
    {       
       $comment = Comment::create([
          'customer_name' => $req->customer_name,
          'content' => $req->comment,
          'id_prd'=>$req->id_prd,
          'status' => '1'
       ]);      
       $comment->save();
    }
    public function list()
    {
        $comment = Comment::all();
        // $abc = Comment->commentPrd();
        return view('admin.comment.list_comment',compact('comment'));
    }
    public function saveCheckComment($id,Request $req)
    {
        
      
        $comment = Comment::find($id);
        // // $comment = Comment::find($id);
        $comment ->fill([
            'status' => $req->status
        ]);
        $comment->save();
        return ['message'=>'ok'];
        // return view('admin.comment.list_comment');
    }
}
