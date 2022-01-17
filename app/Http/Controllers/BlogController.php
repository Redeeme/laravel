<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $blogs = DB::select('select * from blogs');
        return view('clanky', ['blogs' => $blogs]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $comments = DB::table('comments')
            ->where('blog_id', '=', $id)
            ->get();
        return view('clanok', [
            'blog' => $blog,
            'comments' => $comments,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add(){
        return view('adminAdd');
    }
    public function addBlog(Request $request){
        if (Auth::id() == 1) {
            $request->validate([
                'nazov_blogu' => 'required',
                'autor_blogu' => 'required',
                'uvodny_obrazok' => 'required',
                'uvodny_text' => 'required',
                'obsah_blogu' => 'required',
            ]);
            $blog = new Blog();
            $blog->nazov = $request->nazov_blogu;
            $blog->autor = $request->autor_blogu;
            $blog->uvodny_obrazok = $request->uvodny_obrazok;
            $blog->kontent = $request->obsah_blogu;
            $blog->uvodny_text = $request->uvodny_text;
            $blog->slug = $request->nazov_blogu;
            $blog->save();
        }
        return redirect()->route('clanky');
    }

    /**
     * @param $blog_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteBlog($blog_id){
        if (Auth::id() == 1) {
            $delete = DB::table('blogs')
                ->where('id', $blog_id)
                ->delete();
            return redirect('clanky');
        }
    }
    public function edit($blog_id){
        if (Auth::id() == 1) {
            $blog = Blog::find($blog_id);
            return view('adminEdit', [
                'blog' => $blog,
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $blog_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editBlog(Request $request,$blog_id){
        if (Auth::id() == 1) {
            $request->validate([
                'nazov_blogu' => 'required',
                'autor_blogu' => 'required',
                'uvodny_obrazok' => 'required',
                'uvodny_text' => 'required',
                'obsah_blogu' => 'required',
            ]);
            $updating = DB::table('blogs')
                ->where('id', $blog_id)
                ->update([
                    'nazov' => $request->input('nazov_blogu'),
                    'autor' => $request->input('autor_blogu'),
                    'uvodny_obrazok' => $request->input('uvodny_obrazok'),
                    'kontent' => $request->input('obsah_blogu'),
                    'uvodny_text' => $request->input('uvodny_text'),
                    'slug' => $request->input('nazov_blogu'),
                ]);
        }
        return redirect()->route('clanky');
    }


}
