<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="access_token" content="{{ session('access_token') ?? '' }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-datepicker.css')}}">
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('partials.customers_navbar')

    @yield('content')

    <script src="{{ asset('/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/f7053d7bda.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/datatables.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

    @vite(['resources/js/app.js'])



    {{-- DateKiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



    {{-- CUSTOMERS AUTH --}}
    <script >
        // Read access_token from meta tag
        let access_token = document.querySelector('meta[name="access_token"]').content

        // If access_token exists in meta tag, then store at localstorage
        if (access_token != '') {
            localStorage.setItem("access_token", access_token);
        }

        // If localstorage does not have an access_token then user will be redirected to login
        // This is usefull on window refresh
        if (localStorage.getItem('access_token') == '' || localStorage.getItem('access_token') == null) {
            alert('User not authenticated');
            window.location.href = "/login";
        }
    </script>
</body>
</html>
