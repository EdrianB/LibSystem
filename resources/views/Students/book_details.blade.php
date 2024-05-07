@extends('layouts.app1')
@section('content')
    <div class="modal fade" id="bookDetailsModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-gray-800 text-white">
                    <h5 class="modal-title" id="">{{ $book->title }}</h5>
                    <button type="button" class="btn-close text-white" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset( $book->cover_image ) }}" alt="Book Cover" class="w-full rounded-sm">
                        </div>
                        <div class="col-md-7">
                            <p><strong>Author:</strong> {{ $book->author }}</p>
                            <p><strong>Pages:</strong> 202</p>
                            <p><strong>Year:</strong> {{ $book->publication_year }}</p>
                            <p><strong>Ratings:</strong> 4.5 / 5</p>
                            <div class="mt-4">
                                <button class="btn btn-primary me-2">Download</button>
                                <button class="btn btn-primary">Location in Library</button>
                            </div>

                            <div class="description mt-4">
                                <h5 class="font-bold">Description:</h5>
                                <p>{{ $book->description }}</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h5 class="font-bold">Abstract:</h5>
                    <p>{{ $book->abstract }}</p>
                </div>
                <div class="modal-footer bg-gray-200">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('bookDetailsModal'));
            myModal.show();
        
            myModal._element.addEventListener('hidden.bs.modal', function() {
                alert('Modal hidden');
                window.location.href = "{{ route('books.index') }}";
            });
    
        });
    </script>
    
