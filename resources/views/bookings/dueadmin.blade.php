@extends('layouts.tabular') {{-- Assuming you have a layout file named app.blade.php --}}

@section('content')
    <div class="container">
        <h2>All Bookings</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Book Title</th>
                    
                    <th>Student Name</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->book->title }}</td>
                        
                        <td>{{ $booking->student->name }}</td>
                        <td>{{ $booking->dueDate->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
