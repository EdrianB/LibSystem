<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>Document</title>
    <style>
        .card {
            height: 320px; /* Adjust the height of the card */
            overflow: hidden;
            position: relative;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    
        .card:hover img {
            filter: brightness(70%) blur(2px); /* Apply blur and brightness reduction on hover */
        }
    
        .card .details {
            opacity: 0;
            transition: opacity 0.3s ease;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background color */
            padding: 20px;
            color: #fff;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    
        .card:hover .details {
            opacity: 1; /* Show details on hover */
        }
    
        .card .details h5 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
    
        .card .details p {
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
    
        .card .details button {
            padding: 8px 16px;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }
    
        .card .details button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
@yield('content')


<!-- Bootstrap JS (popper.js is required for tooltips and popovers) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<!-- Your additional scripts -->
@yield('scripts')
</body>
</html>
