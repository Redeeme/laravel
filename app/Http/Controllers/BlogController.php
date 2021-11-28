<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = DB::select('select * from blogy');
        return view('clanky',['blogy'=>$blogs]);
    }
    public function crete($id){
        $row = DB::select('select * from blogy where id == $id');
        return view('clanok',$row);
    }

}
