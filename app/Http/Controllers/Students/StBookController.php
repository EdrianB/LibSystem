<?php
namespace App\Http\Controllers\Students;


use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class StBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('Students.books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //dd($book);
        return view('Students.book_details',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
