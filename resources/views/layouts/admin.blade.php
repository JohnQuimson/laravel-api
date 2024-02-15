<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>JQ's Portfolio</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

        <!-- Fontawesome 6 cdn -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
            integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])
    </head>

    <body>
        <div id="app">

            {{-- <header class="header-dashboard navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
                <div class="row justify-content-between">


                    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-nav">

                </div>
            </header> --}}

            {{-- <div class="container-fluid vh-100">
                <div class="row h-100"> --}}
            <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
            <div class="jq-sidebar">
                {{-- HOME --}}
                <div class="header-sidebar">
                    <a href="/">
                        <i class="fa-solid fa-house fs-3"></i>
                    </a>
                </div>
                {{-- list options --}}
                <div class="sidebar-options">
                    <a class="{{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                    </a>
                    <a class="{{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}" href="{{ route('admin.projects.index') }}">
                        <i class="fa-solid fa-bars-progress fa-lg fa-fw"></i> Projects
                    </a>
                </div>
                {{-- sidebar-logout --}}
                <div class="sidebar-logout">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <span>Logout</span>
                        <i class="fa-solid fa-right-from-bracket fs-2"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            {{-- content dashboard --}}
            @yield('content')

            {{-- </div>
            </div> --}}

        </div>
    </body>

</html>
