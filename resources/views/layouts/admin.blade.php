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

        <!-- navbar -->

        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">MovieBase</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <i class="fas fa-user mr-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                                </div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- end navbar -->
=
        <!-- left sidebar -->
=
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin') }}"><i class="fa fa-fw fa-rocket"></i>Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
                                    <i class="fas fa-fw fa-file"></i>Posts</a>
                                <div id="submenu-1" class="collapse submenu">
                                    
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('admin/posts') }}">All posts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('admin/posts/create') }}">New post</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/categories') }}"><i class="fas fa-fw fa-table"></i>Categories</a>
                            </li>
                           
                           @if(Auth::user()->isAdmin())
                           
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5">
                                <i class="fa fa-fw fa-user-circle"></i>Users</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('admin/users') }}">All users</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('admin/users/create') }}">New user</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="#{{ url('admin/site') }}"><i class="fa fa-fw fa-rocket"></i>Site</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- end left sidebar -->

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
    <script src="{{ asset('public/js/scripts.js') }}"></script>
</body>
</html>
