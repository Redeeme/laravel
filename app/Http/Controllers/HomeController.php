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
        $entry = Blog::orderBy('created_at', 'ASC')->get();
        end($entry);         // move the internal pointer to the end of the array
        $key = key($entry);  // fetches the key of the element pointed to by th
        $entry = Blog::orderBy('created_at', 'ASC')->get();
    }

}
