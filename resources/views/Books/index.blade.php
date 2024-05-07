@extends('layouts.app1')

@section('content')
    <div class="col-auto ms-auto d-print-none pt-2 m-lg-2 ">
        <div class="btn-list">
            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                Add Book
            </a>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Book Author</th>
                            <th>Publication Year</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @forelse ($books as $book)
                        <tr>
                            <td>
                                <div class="d-flex py-1 align-items-center">
                                    <img src="{{ asset($book->cover_image) }}" class="avatar me-2" style=""></img>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">Title</div>
                                        <div class="text-secondary"><a href="#" class="text-reset">{{ $book->title }}</a></div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div>Author</div>
                                <div class="text-secondary">{{ $book->author }}</div>
                            </td>

                            <td>
                                <div>Year</div>
                                <div class="text-secondary">{{ $book->publication_year }}</div>
                            </td>


                            <td>
                                <div class="flex-fill">
                                    <a href="" class="p-2">
                                        <a href="{{ route('book.edit',$book->id) }}"  class=" btn btn-warning btn-sm">Edit</a>
                                    </form>
                                    
                                    <form action="{{ route('book.destroy', $book->id) }}" method="post" class="p-1">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class=" btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <td>

                                <tr>
                                    <td>No Supervision Requests Sent !!</td>
                                </tr>
                            </td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Book Title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="author">Author</label>
                        <input type="text" class="form-control" name="author" id="author"
                            placeholder="Book Author">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="publication_year">Publication Year</label>
                        <input type="number" class="form-control" name="publication_year" id="publication_year"
                            placeholder="Publication Year">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="isbn">ISBN</label>
                        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="hidden" name="has_digital_copy" value="0">
                        <!-- Hidden input for "unchecked" state -->
                        <input type="checkbox" class="form-check-input" name="has_digital_copy"
                            id="has_digital_copy_checkbox" value="1" onchange="toggleCheckboxValue()">
                        <label class="form-check-label" for="has_digital_copy">Has Digital Copy</label>

                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="pdf_file">PDF File</label>
                        <input type="file" class="form-control" name="pdf_file" id="pdf_file">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Book Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="abstract">Abstract</label>
                        <textarea class="form-control" name="abstract" id="abstract" rows="3" placeholder="Book Abstract"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="physical_location">Physical Location</label>
                        <input type="text" class="form-control" name="physical_location" id="physical_location"
                            placeholder="Physical Location">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category_id">Category</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="">Select Category</option>
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
                        Add Book
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function toggleCheckboxValue() {
        var checkbox = document.getElementById('has_digital_copy_checkbox');
        if (checkbox.checked) {
            checkbox.value = '1'; // Set value to '1' (true) if checked
        } else {
            checkbox.value = '0'; // Set value to '0' (false) if unchecked
        }
    }
</script>
