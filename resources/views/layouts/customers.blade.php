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

    <script src="{{ asset('/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datepicker.min.js')}}"></script>

    @vite(['resources/css/app.css'])
</head>

<body style="padding: 0px; margin: 0px; background-color: #eef1f6;">
    @include('partials.customers_navbar')

    @yield('content')
    <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/f7053d7bda.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/datatables.min.js')}}"></script>

    @vite(['resources/js/app.js'])

    <script>
        new DataTable('#example', {
            order: [] // Disable DataTables default sorting
        });
    </script>
</body>
</html>
