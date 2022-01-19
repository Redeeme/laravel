<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        $book_cat = BookCategory::all();
        return view('knihy',['books'=>$books,'book_cat'=>$book_cat]);
    }
    public function addBook(Request $request){
        if (Auth::id() == 1) {
            $request->validate([
                'nazov_knihy' => 'required',
                'autor_knihy' => 'required',
                'kategoria'=>'required',
            ]);
            $string =  $request->kategoria;
            $str_arr = explode ("/", $string);
            $book = new Book();
            $book->nazov = $request->nazov_knihy;
            $book->autor = $request->autor_knihy;
            $book->book_cat_id = $str_arr[1];
            $book->save();
        }
        return redirect()->route('knihy');
    }
    public function addCat(Request $request){
        if (Auth::id() == 1) {
            $request->validate([
                'nazov_kategorie' => 'required|unique:book_categories,nazov',
            ]);
            $category = new BookCategory();
            $category->nazov = $request->nazov_kategorie;
            $category->save();
        }
        return redirect()->route('knihy');
    }

}
