<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/d93ad57f7f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/balloon.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <header id="header">
                <img class="img-fluid" alt="ヘッダー" src="{{ asset('/img/header.png') }}"></img>
        </header>
        <nav class="navbar navbar-expand-md sticky-top bg-dark navbar-dark p-2">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="page-top" class="img-fluid" alt="ロゴ" src="{{ asset('/img/exlogo.png') }}"></img>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link mob-text" href="{{ url('/introduction') }}">エクパンとは？</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <form class="form-inline mr-2" action="{{ action('User\ArticleController@search') }}" method="get">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="search_article" placeholder="記事検索">
                                <div class="input-group-append">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-info"><i class="fas fa-search search"></i></button>
                                </div>
                            </div>
                        </form>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-sm">{{ __('messages.Login') }}</button></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-primary btn-sm">{{ __('messages.Register') }}</button></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle mob-text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->image_path == 1)
                                        <img src="{{$path}}{{ Auth::user()->id}}.jpg?{{time()}}" class="rounded-circle" width="30px" height="30px">
                                    @else
                                        <img src="{{ asset('/img/noimage.jpg') }}" class="rounded-circle" width="30px" height="30px">
                                    @endif 
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item mob-text" href="{{ url('/user/article/create') }}"><i class="fas fa-pen"></i> 記事を書く</a>
                                    <a class="dropdown-item mob-text" href="{{ url('/user/article/index') }}"><i class="fas fa-book-open"></i> 記事一覧</a>
                                    <a class="dropdown-item mob-text" href="{{ url('/user/profile/'.Auth::id().'/edit') }}"><i class="fas fa-address-card"></i> プロフィール編集</a>
                                    <a class="dropdown-item mob-text" href="{{ url('/user/article/likes/'.Auth::id()) }}"><i>♥</i> お気に入り記事</a>
                                    <a class="dropdown-item mob-text" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-running"></i> {{ __('messages.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if (session('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif
            
            @yield('content')
        </main>
    </div>
    <script>
    (function() {
        window.addEventListener("load", function () {
            $('[data-toggle="popover"]').popover();
        });
    })();
    </script>
</body>
</html>
