<?php
namespace App\Http\Controllers\Students;


use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class booksController extends Controller
{
    public function digital(){
        $books = Book::where('has_digital_copy',1 )->get();
        return view('Students.digital',compact('books'));
    }
}
