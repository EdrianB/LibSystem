@extends('layouts.app1')

@section('content')

<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Available Books</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                        @csrf
                        @if ($books->isNotEmpty())
                        <div class="mb-3">
                            <label for="book" class="form-label">Select a Book:</label>
                            <select name="book_id" id="book_id" class="form-select">
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}" data-author="{{ $book->author }}" data-publication-year="{{ $book->publication_year }}" data-description="{{ $book->description }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author:</label>
                            <input type="text" id="author" name="author" class="form-control" value="{{ $books->first()->author }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="publication_year" class="form-label">Publication Year:</label>
                            <input type="text" id="publication_year" name="publication_year" class="form-control" value="{{ $books->first()->publication_year }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="5" readonly>{{ $books->first()->description }}</textarea>
                        </div>
                        @else
                        <p>No books available.</p>
                        @endif
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookSelect = document.getElementById('book_id');
        const authorInput = document.getElementById('author');
        const publicationYearInput = document.getElementById('publication_year');
        const descriptionTextarea = document.getElementById('description');

        // Update form fields when book selection changes
        bookSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            authorInput.value = selectedOption.getAttribute('data-author');
            publicationYearInput.value = selectedOption.getAttribute('data-publication-year');
            descriptionTextarea.value = selectedOption.getAttribute('data-description');
        });
    });
</script>
