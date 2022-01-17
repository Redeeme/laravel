<?php

namespace App\Http\Controllers;

use App\Models\UserBlog;
use App\Models\User;
use Dotenv\Validator;
use http\Env\Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class UserBlogsController extends Controller
{
    public function index()
    {
        return view('clanky_pouzivatelov');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addBlog(Request $request)
    {
        $request->validate([
            'blog_name' => 'required',
            'blog_intro' => 'required',
            'blog_content' => 'required'
        ]);
        $user = User::find(Auth::id());
        $blog = new UserBlog();
        $blog->nazov = $request->blog_name;
        $blog->uvodny_text = $request->blog_intro;
        $blog->kontent = $request->blog_content;
        $blog->autor = $user->name;
        $blog->slug = $request->blog_name;
        $query = $blog->save();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'New blog has been successfully saved']);
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getUserBlogsList()
    {
        $blogs = UserBlog::all();
        return DataTables::of($blogs)
            ->addColumn('actions', function ($row) {
                return '<button class="btn btn-sm btn-info" data-id="' . $row['id'] . '"id="getUserBlogBtn">zobraz</button>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showBlogUser($id)
    {
        $blog = UserBlog::find($id);
        return view('pouzivatelov_clanok', [
            'blog' => $blog,
        ]);
    }
}
