<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <!-- main wrapper -->

    <div class="dashboard-main-wrapper">

        @include('admin.includes.header')

        @include('admin.includes.sidenav')

        <!-- wrapper  -->

        <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                        <div class="container-fluid dashboard-content">
                            @yield('content')
                        </div>
                </div>
        </div>

        <!-- end wrapper  -->

    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
