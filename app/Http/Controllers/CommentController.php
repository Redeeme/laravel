<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param $blog_id
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(Request $request, $blog_id)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $blog = Blog::find($blog_id);
        $user = User::find(Auth::id());
        $comment = new Comment();
        $comment->name = $user->name;
        $comment->comment = $request->comment;
        $comment->blog_id = $blog_id;
        $comment->user_id = $user->id;
        $comment->save();
        return redirect()->route('blog.show', $blog->id);
    }

    /**
     * @param Request $request
     * @param $comment_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function editComment(Request $request, $comment_id)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $updating = DB::table('comments')
            ->where('id', $comment_id)
            ->where('user_id', Auth::id())
            ->update([
                'comment' => $request->input('comment'),
            ]);
        return redirect('profile');
    }

    /**
     * @param $comment_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function delete($comment_id)
    {
        $delete = DB::table('comments')
            ->where('id', $comment_id)
            ->where('user_id', Auth::id())
            ->delete();
        return redirect('profile');
    }

}
