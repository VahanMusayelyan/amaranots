<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<style>
    .menu_pages{
        margin-right: 5px;
    }
</style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <?php
                    if(app()->getLocale() == null){
                        app()->setLocale("en");
                        }
                ?>
                <a class="navbar-brand" href="{{ url('/'.app()->getLocale()) }}">
                    {{ config('app.name', 'Amaranots') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="menu_pages" href="/{{app()->getLocale()}}/about">about</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/career">career</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/contact">contact</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/day-with-us">day With us</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/greening">greening</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/offers">offers</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/sales">sales</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/terms">terms</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/tours">tours</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/weekend">weekend</a>
                <a class="menu_pages" href="/{{app()->getLocale()}}/why-amaranots">why-amaranots</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ app()->getLocale() }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/en">English</a>
                                    <a href="/ru">Russian</a>
                                    <a href="/hy">Armenian</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">

            @yield('content')
        </main>
        <footer>
            <h1>footer</h1>
        </footer>
    </div>
</body>
</html>
