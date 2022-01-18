<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function home(){
        $blogs = Blog::orderBy('created_at', 'ASC')->get();
        $latestBlogs = array();
        for ($x = 0; $x <= 2; $x++) {
            $latestBlogs[$x] = $blogs->last();
            unset($blogs[count($blogs)-1]);
        }
        $randomBlogs = Blog::inRandomOrder()->limit(3)->get();
        return view('index',['latestBlogs' => $latestBlogs,'randomBlogs'=>$randomBlogs]);

    }

}
