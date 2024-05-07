<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/mdb.min.js', 'resources/css/all.min.css', 'resources/css/mdb.min.css'])
    <style>
        .gradient-custom-2 {

            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /*background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);*/
            background: #247464;
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RPMS|FCI</title>
</head>

<body>
    <section class="h-50 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">E-LIBRARY SYSTEM(MUBS)</h4>
                                    <p class="small mb-0">Welcome to our E-Library System! Please fill out the registration form to create an account.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{ asset('images/logo.jpg') }}" style="width: 50px;" alt="logo">
                                    </div>
                                    <form method="post" action="{{ route('student.store') }}" enctype="multipart/form-data"

                                    >
                                        @csrf
                                        <p class="text-center mt-3"><strong>REGISTER</strong></p>
    
                                        <div class="form-outline mb-4">
                                            <input type="text" id="fullname" name="fullname" class="form-control"/>
                                            <label class="form-label" for="fullname">Full Name</label>
                                        </div>
    
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control"/>
                                            <label class="form-label" for="email">Email Address</label>
                                        </div>
    
                                        <div class="form-outline mb-4">
                                            <input type="text" id="student_no" name="student_no" class="form-control"/>
                                            <label class="form-label" for="student_no">Student Number</label>
                                        </div>
    
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control"/>
                                            <label class="form-label" for="password">Password</label>
                                        </div>
    
                                        <div class="form-outline mb-4">
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control"/>
                                            <label class="form-label" for="confirm_password">Confirm Password</label>
                                        </div>
    
                                        <div class="form-outline mb-4">
                                            <input type="file" id="image" name="image" class="form-control"/>
                                            <label class="form-label" for="image">Upload Picture</label>
                                        </div>
    
                                        <div class="form-outline mb-4">
                                            <select id="program" name="program" class="form-select">
                                                <option value="" selected disabled>Select Program</option>
                                                <option value="BSc Computer Science">BSc Computer Science</option>
                                                <option value="BSc Information Technology">BSc Information Technology</option>
                                                <option value="BSc Software Engineering">BSc Software Engineering</option>
                                            </select>
                                        </div>
    
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                                            <p class="text-muted mb-0">Already have an account? <a href="{{ route('student_login_form') }}">Log in</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

</body>

</html>
