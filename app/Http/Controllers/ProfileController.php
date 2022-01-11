<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    function edit(){
        $row = DB::table('users')
            ->where('id',Auth::id())
            ->first();
        $data = [
            'Info'=>$row,
            'Title'=>'Edit'
            ];
        return view('auth.edit',$data);
    }
    function update(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $updating = DB::table('users')
                    ->where('id',$request->input('cid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'email'=>$request->input('email')
                    ]);
        return redirect('profile');
    }

    function delete(){
        $delete = DB::table('users')
            ->where('id',Auth::id())
            ->delete();
        return redirect('index');
    }
}
