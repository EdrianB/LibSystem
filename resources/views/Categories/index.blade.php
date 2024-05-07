@extends('layouts.app1')
@section('content')
    {{-- Adding topic --}}
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
                Create new Category
            </a>
        </div>
    </div>


    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif

    {{-- showing topics --}}
    @forelse($cats as $cat)
        <div class="">
            <div class="row row-cards">
                <div class="space-y">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-auto">
                                <div class="card-body">
                                    <div class="avatar avatar-md"
                                        style="background-color: #132838
                                "></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-body ps-0">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-0"><a href="#">{{ $cat->name }}</a></h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div
                                                class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                                <div class="list-inline-item">
                                                    Description : {{ $cat->description }}
                                                </div>
                                            </div>
                                            <div class="col-md-auto">

                                                <div class="mt-3 badges">
                                                    <a href=""
                                                        class="badge
                                                badge-outline
                                                text-secondary
                                                fw-normal badge-pill">view</a>
                                                
                                                    <a href="{{ route('category.edit',$cat->id) }}"
                                                        class="badge
                                                badge-outline
                                                text-secondary
                                                fw-normal badge-pill">Edit</a>

                                                    <form action="{{ route('category.destroy', $cat->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button href="#" type="submit"
                                                            class="badge badge-outline
                                                    text-secondary
                                                    fw-normal badge-pill">Delete</button>
                                                    </form>

                                                    {{-- <a href="#" class="badge badge-outline text-secondary
                                            fw-normal badge-pill">Propose</a> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @empty

            <div class="row row-cards">
                <div class="space-y">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-auto">
                                <div class="card-body">
                                    <div class="avatar avatar-md"
                                        style="background-color: #0c84ff
                            "></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-body ps-0">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-0"><a href="#">No Categories Registered</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforelse




    {{--    the add researchh topic model --}}
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Category Name">
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label" for="keyword">Description</label>
                            <input type="text" class="form-control"
                                   name="keyword" itemid="keyword"
                                   id="title"
                                   placeholder="Keyword">
                        </div>

                        <label class="form-label" for="status">Topic Status</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="status" id="status" value="Proposed"
                                           class="form-selectgroup-input"
                                           checked>
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Proposing</span>
                                        <span class="d-block text-secondary">For personal undertaking</span>
                                    </span>
                                </span>
                                </label>
                            </div>

                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="status" id="status" value="recommended"
                                           class="form-selectgroup-input">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Recommend</span>
                                        <span class="d-block text-secondary">Available for all Students to
                                            attempt
                                        </span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label" for="link">Reviewed
                                        Research Paper</label>
                                    <div class="input-group input-group-flat">
                                    <span class="input-group-text">https://googlescholar/
                                    </span>
                                        <input type="text" class="form-control ps-0" id="link"
                                               name="link"
                                               autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="domain">Domain</label>
                                    <select class="form-select" name="domain" id="domain">
                                        <option value="Education" selected>Education</option>
                                        <option value="Security">Security</option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Transport">Transport</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>


                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label" for="description">Category Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div>
                                    <label class="form-label" for="abstract">Topic Abstract</label>
                                    <textarea class="form-control" name="abstract" id="description"
                                              rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label" for="uniqueness">Uniqueness</label>
                                    <textarea class="form-control" name="uniqueness" id="uniqueness"
                                              rows="3" placeholder="Specificy how unique your solution is
                                              from the existing solutions(Optional)"></textarea>
                                </div>
                            </div> --}}

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
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
