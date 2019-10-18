<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
     
  
    </style>
    @yield('head-style')
</head>

<body>
    @include('layouts.modal-sms')
    @include('layouts.toast')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @auth
                    {{ (Auth::user()->name ? Auth::user()->name : 'USER') . '@' . config('app.name') }}
                    @else
                    {{ config('app.name', 'Laravel') }}
                    @endauth
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(isset($serieTitle))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $serieUrl }}">{{ $serieTitle }}</a>
                        </li>
                        @endif
                        @yield('navbar-left')
                    </ul>

                    <!-- Right Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav ml-auto">
                        @if(Request::path() != 'uploads')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('uploads') }}">Upload</a>
                        </li>
                        @endif
                        @if(Request::path() != 'profile')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('profile') }}">Profile</a>
                        </li>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <main class="my-4">@yield('content')</main>
        </div>
    </div>

    <!-- Scripts -->
    <script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    @yield('extra-script')
</body>

</html>
