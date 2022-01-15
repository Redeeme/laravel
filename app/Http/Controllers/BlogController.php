<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        return view('clanok', [
            'blog'=>$blog
        ]);
    }


}
