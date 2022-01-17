<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function index()
    {
        $comments = DB::table('comments')
            ->where('user_id', '=', Auth::id())
            ->get();
        return view('profile', [
            'comments' => $comments,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function edit()
    {
        $row = DB::table('users')
            ->where('id', Auth::id())
            ->first();
        $data = [
            'Info' => $row,
            'Title' => 'Edit'
        ];
        return view('auth.edit', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $updating = DB::table('users')
            ->where('id', $request->input('cid'))
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        return redirect('profile');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function delete()
    {
        $delete = DB::table('users')
            ->where('id', Auth::id())
            ->delete();
        return redirect('index');
    }
}
