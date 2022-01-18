<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index(Request $request){
        if (Auth::id() == 1) {
            $request->validate([
                'nazov_kategorie' => 'required|unique:categories,nazov',
            ]);
            $category = new Category();
            $category->nazov = $request->nazov_kategorie;
            $category->save();
        }
        return redirect()->route('clanky');
    }
}
