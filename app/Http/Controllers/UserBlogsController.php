<?php

namespace App\Http\Controllers;

use App\Models\UserBlogs;
use Dotenv\Validator;
use http\Env\Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserBlogsController extends Controller
{
    public function index(){
        return view('clanky_pouzivatelov');
    }
    public function addBlog(Request $request){
        $validator = \Validator::make($request->all(),[
            'blog_name'=>'required|unique:user_blogs',
            'blog'=>'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $blog = new UserBlogs();
            $blog->blog_name = $request->blog_name;
            $blog->blog = $request->blog;
            $query = $blog->save();
            if (!$query){
                return response()->json(['code'=>0,'msg'=>'Something went wrong']);
            }else{
                return response()->json(['code'=>1,'msg'=>'New blog has been successfully saved']);
            }
        }
    }
    public function getUserBlogsList(){
        $blogs = UserBlogs::all();
        return DataTables::of($blogs)
                            ->make(true);
    }
}
