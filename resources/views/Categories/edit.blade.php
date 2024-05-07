@extends('layouts.app1')
@section('content')

    <form action="{{ route('category.update', $category->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="modal modal-blur fade" id="EditCategory" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Category Name" value="{{ $category->name }}">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label" for="description">Category Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $category->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button class="btn btn-primary ms-auto" data-bs-dismiss="modal" type="submit">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Edit Category
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            // Attach an event handler to show the modal when the page is fully loaded
            $('#EditCategory').modal('show');

            // Add an event listener to the modal close event
            $('#EditCategory').on('hidden.bs.modal', function () {
                window.location.href = "{{ route('category.index') }}";
            });
        });
    </script>
@endsection
