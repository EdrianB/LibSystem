@extends('layouts.tabular')
@section('content')
@php
    $counter = 0;
@endphp
<div class="row m-3">
    @forelse($books as $book)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img class="card-img-top" src="{{ asset($book->cover_image) }}" alt="Book Cover">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $book->title }}</h5>
                <p class="card-text">Year of Publishing: {{ $book->publication_year }}</p>
            </div>
            <div class="details">
                <h5 class="fw-bold">{{ $book->title }}</h5>
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                <a href="{{ route('books.show',$book->id) }}" class="btn btn-warning">More Details</a>
                <a href="{{ route('books.show',$book->id) }}" class="btn btn-warning">Download</a>
            </div>
        </div>
    </div>
    
        @php
            $counter++;
            if ($counter % 4 == 0) {
                echo '<div class="clearfix"></div>';
            }
        @endphp
    @empty
        <div class="container">
            <p class="pt-4">No Digital Books Registered As Of Yet</p>
        </div>
    @endforelse
</div>
@endsection
