<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request->input('query');

    $books = Book::where('title', 'like', "%$query%")
                        ->orWhere('author', 'like', "%$query%")
                        ->orWhere('category', 'like', "%$query%")
                        ->orWhere('publication_year', 'like', "%$query%")
                        ->get();

    // Pass the search results to the view
    return view('Students.books', compact('books'));
    }
}
