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
    <title>ELIB</title>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{ asset('images/logo.jpg') }}" style="width: 150px;" alt="logo">
                                    </div>
                                    <form method="post" action="{{ route('adminLogin') }}">
                                        @csrf
                                        <p class="text-center mt-3"><strong>LOGIN</strong></p>
                                    
                                        <div class="form-outline mb-4">
                                            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" />
                                            <label class="form-label" for="email">Email</label>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control" />
                                            <label class="form-label" for="password">Password</label>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                                            <a class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" href='{{ route('student_login_form') }}'>Continue as Student</a>
                                            <a class="text-muted" href="#">Forgot password?</a>
                                            <a class="text-muted" href="{{ route('admin register page') }}">Create Account</a>
                                        </div>
                                        
                                    </form>
                                    
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">E-LIBRARY SYSTEM(MUBS)</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                        do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
