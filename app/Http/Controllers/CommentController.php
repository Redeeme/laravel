<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;

class CommentController extends Controller
{
    public function store(Request $request,$blog_id){
        $blog = Blog::find($blog_id);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->blog_id = $blog_id;
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect()->route('blog.show', $blog->id);
        }
}
