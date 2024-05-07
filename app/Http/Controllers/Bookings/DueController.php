<?php
namespace App\Http\Controllers\Bookings;


use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DueController extends Controller
{
    public function dues(){

        if (Auth::guard('student')->check()) {
            $studentId = Auth::guard('student')->id();
            $bookings = Booking::where('student_id', $studentId)->get();
            return view('bookings.dues', compact('bookings'));
        } 
        if (Auth::guard('admin')->check()) {
            $bookings = Booking::all();
            return view('bookings.dueadmin', compact('bookings'));
        }
        
    }
}
