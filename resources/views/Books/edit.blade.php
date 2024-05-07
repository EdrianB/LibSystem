@extends('layouts.app1')
@section('content')
<form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="modal modal-blur fade" id="Editbook" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Book Title" value="{{ $book->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="author">Author</label>
                        <input type="text" class="form-control" name="author" id="author"
                            placeholder="Book Author" value="{{ $book->author }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="publication_year">Publication Year</label>
                        <input type="number" class="form-control" name="publication_year" id="publication_year"
                            placeholder="Publication Year" value="{{ $book->publication_year }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="isbn">ISBN</label>
                        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="{{ $book->isbn }}">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="hidden" name="has_digital_copy" value="{{ $book->has_digital_copy ? '1' : '0' }}">
                        <label class="form-check-label" for="has_digital_copy">Has Digital Copy</label>

                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="pdf_file">PDF File</label>
                        <input type="file" class="form-control" name="pdf_file" id="pdf_file" value="{{ $book->pdf_file }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image" value="{{ $book->cover_image }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="">{{ $book->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="abstract">Abstract</label>
                        <textarea class="form-control" name="abstract" id="abstract" rows="3">
                        {{ $book->abstract }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="physical_location">Physical Location</label>
                        <input type="text" class="form-control" name="physical_location" id="physical_location"
                            value="{{ $book->physical_location }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category_id">Category</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="">{{ $book->category_id }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary ms-auto" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Update Book
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

        <script>
            $(document).ready(function () {
                $('#Editbook').modal('show');
                $('#Editbook').on('hidden.bs.modal', function () {
                    window.location.href = "{{ route('book.index') }}";
                });
            });
        </script>

@endsection
