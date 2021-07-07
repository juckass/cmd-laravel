<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ url('librerias/bootstrap-4/css/bootstrap.min.css')}}">
    @stack('css')
   
</head>
<body>

    

    @yield('content')


    <script src="{{ url('librerias/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('librerias/popper.min.js') }}" ></script>
    <script src="{{ url('librerias/bootstrap-4/js/bootstrap.min.js')}}"></script>

    @stack('scripts')
</body>
</html>
