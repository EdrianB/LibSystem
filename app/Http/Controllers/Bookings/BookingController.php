<?php
namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('student')->check()) {
            $student = Auth::guard('student')->id();
            $bookings = Booking::where('student_id', $student)->get();
            return view('bookings.mybooks', compact('bookings'));
        }
        
        if (Auth::guard('admin')->check()) {
            $bookings = Booking::all();
            return view('bookings.admin', compact('bookings'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::where('has_digital_copy', 1)->get();
        return view('bookings.index', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);
        //dd();

        $booking = new Booking();

        $booking->dueDate = Carbon::now()->addWeek();
        $booking->book_id = $request->book_id;
        $booking->student_id = Auth::guard('student')->id();

        // Save the booking
        $booking->save();

        // Redirect the user back with a success message
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
