<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-LIB|MUBS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']);

    <style>
        p,a{
            color:white;
        }
        h2{color:black;}

        aside i{
            color:white;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height" style="color:white">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href=""
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off" style="color: red"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('student logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link text-center">| E - LIBRARY SYSTEM | MUBS</a>

                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{--            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li> --}}

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('images/avatar.png') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">7 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-primary elevation-4" style="background-color:#247464">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">E-LIB|MUBS</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if ($student && $student->image)
                            <img src="{{ asset($student->image) }}" alt="Student Image" style="width: 40px;height:40px; border-radius:50px">
                        @endif
                    </div>
                    
                    <div class="info">
                        <a href="#" class="d-block">{{ $student->fullname }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-header">ACCOUNT</li>
                        <li class="nav-item">
                            <a href="{{ route('student profile') }}" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('')}}" class="nav-link">
                                <i class="nav-icon fa fa-lock"></i>
                                <p>
                                    Security
                                </p>
                            </a>
                        </li> --}}


                        <li class="nav-header bg-black" style="background-color:#247464">BOOKS</li>
                        <li class="nav-item">
                            <a href="{{ route('books.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    All
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('digital') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Digital
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Non-Digital
                                </p>
                            </a>
                        </li>


                        <li class="nav-header">BOOKINGS</li>
                        <li class="nav-item">
                            <a href="{{ route('booking.create') }}" class="nav-link">
                                <i class="nav-icon far fa-list-alt"></i>
                                <p>
                                    Books
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dues') }}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Due Dates
                                </p>
                            </a>
                        </li>


                        <li class="nav-header">WISHLIST</li>
                        {{-- <li class="nav-item">
                        --}}{{-- <a href="" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Concept
                            </p>
                        </a> --}}{{--
                    </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('booking.index') }}" class="nav-link">
                                <i class="nav-icon far fa-heart"></i>
                                <p>
                                    My List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-thumbs-up "></i>
                                <p>
                                    Recommended
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">COMMUNICATION</li>

                        <li class="nav-item">
                            <a href="{{ route('coming soon') }}" class="nav-link">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>
                                    Announcements
                                </p>
                            </a>
                        </li>


                        <li class="nav-header">REVIEWS</li>
                        <li class="nav-item">
                            <a href="{{ route('coming soon') }}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Students
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
            <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
                <div class="nav-item dropdown">
                    <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="false">Close</a>
                    <div class="dropdown-menu mt-0">
                        <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close
                            All</a>
                        <a class="dropdown-item" href="#" data-widget="iframe-close"
                            data-type="all-other">Close All
                            Other</a>
                    </div>
                </div>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i
                        class="fas fa-angle-double-left"></i></a>
                <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i
                        class="fas fa-angle-double-right"></i></a>
                <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i
                        class="fas fa-expand"></i></a>
            </div>
            <div class="tab-content">
                <div class="tab-empty">
                    <h2 class="display-4 text-center">MAKERERE UNIVERSITY BUSINESS SCHOOL e-LIBRARY SYSTEM</h2>
                </div>
                <div class="tab-loading">
                    <div>
                        <h2 class="display-4">loading <i class="fa fa-sync fa-spin"></i></h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
