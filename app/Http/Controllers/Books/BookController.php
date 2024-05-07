<?php
namespace App\Http\Controllers\Books;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        //dd($books);
        return view('Books.index', compact('categories','books'));
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
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publication_year' => 'required|integer|min:1900|max:' . date('Y'),
                'isbn' => 'required|string|max:255|unique:books,isbn',
                'has_digital_copy' => 'nullable|boolean',
                'pdf_file' => 'nullable|file|mimes:pdf|max:220480', // 
                'cover_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:110480', // 
                'description' => 'nullable|string',
                'abstract' => 'nullable|string',
                'physical_location' => 'nullable|string',
                'category_id' => 'nullable|exists:categories,id',
            ]);
            
            if ($request->hasFile('pdf_file')) {
                $pdfFile = $request->file('pdf_file');
                $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
                $pdfFile->move(public_path('pdfs'), $pdfFileName);
                $validatedData['pdf_file'] = 'pdfs/' . $pdfFileName;
            }
            

            if ($request->hasFile('cover_image')) {
                $coverImage = $request->file('cover_image');
                $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
                $coverImage->move(public_path('covers'), $coverImageName);
                $validatedData['cover_image'] = 'covers/' . $coverImageName;
            }
            
            $book = Book::create($validatedData);

            return redirect()->route('book.index')->with('success', 'Book created successfully.');
        } catch (ValidationException $e) {
            //dd($e);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            //dd($e);
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('Books.edit', compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'publication_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'isbn' => ['string','max:255',Rule::unique('books')->ignore($book->id),],
            'has_digital_copy' => 'nullable|boolean',
            'pdf_file' => 'nullable|file|mimes:pdf|max:220480', // 
            'cover_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:110480', // 
            'description' => 'nullable|string',
            'abstract' => 'nullable|string',
            'physical_location' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        
        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs'), $pdfFileName);
            $validatedData['pdf_file'] = 'pdfs/' . $pdfFileName;
        }
        

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('covers'), $coverImageName);
            $validatedData['cover_image'] = 'covers/' . $coverImageName;
        }

        $book -> update($validatedData);
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book -> delete();
        return redirect()->back();
    }
}
