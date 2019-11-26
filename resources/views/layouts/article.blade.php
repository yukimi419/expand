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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/balloon.css') }}" rel="stylesheet">
    
    <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : 'textarea',
            plugins  : 'jbimages link autolink preview textcolor',
            toolbar1  : 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages',
            toolbar2  : 'undo redo | styleselect | forecolor | fontsizeselect',
            menubar  : false,
            relative_urls : false,
            language : 'ja',
            branding: false,
            statusbar: false,
            force_br_newlines : true,
            force_p_newlines : false,
            forced_root_block : 'div',
            mobile : {
                theme: 'mobile',
                plugins: [ 'autosave', 'jbimages', 'autolink' ],
                toolbar: [ 'undo', 'bold', 'italic', 'styleselect','jbimages' ]
            }
        });
    </script>
    
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
                            <a class="nav-link" href="{{ url('/introduction') }}">エクパンとは？</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-outline-primary btn-sm">{{ __('messages.Login') }}</button></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-outline-primary btn-sm">{{ __('messages.Register') }}</button></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/user/article/create') }}"><i class="fas fa-pen"></i> 記事を書く</a>
                                    <a class="dropdown-item" href="{{ url('/user/article/index') }}"><i class="fas fa-book-open"></i> 記事一覧</a>
                                    <a class="dropdown-item" href="{{ url('/user/profile/'.Auth::id().'/edit') }}"><i class="fas fa-address-card"></i> プロフィール編集</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
    
    
</body>
</html>
