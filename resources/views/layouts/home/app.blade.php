<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <title>Task</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- bootstrap --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/select2/css/select2.min.css') }}">
</head>
<body>

    @include('layouts.home.include._navbar')

    @yield('content')

    {{-- jquery --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    {{-- select2 --}}
    <script src="{{ asset('dashboard_files/plugins/select2/js/select2.full.min.js') }}"></script>

    @stack('demoCategory')
    @stack('products')

</body>
</html>