<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = DB::select('select * from blogs');
        return view('clanky',['blogs'=>$blogs]);
    }
    public function show($id){
        $blog = Blog::find($id);
        $comments = DB::table('comments')
            ->where('blog_id', '=', $id)
            ->get();
        return view('clanok', [
            'blog'=>$blog,
            'comments'=>$comments,
        ]);
    }


}
