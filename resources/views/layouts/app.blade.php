<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('APP_NAME', 'CRUD') }}</title>
    <meta name="description" content="@yield('description')">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="header">
            <div class="header__inner">
                <div class="header__logo">
                    <a href="{{ url('/') }}">{{ config('app.name', 'CRUD') }}</a>
                </div>
                <div class="header__menu">
                    <ul class="header__menu-list">
                        <li class="header__menu-item">
                            <a href="{{ url('/posts') }}">投稿</a>
                        </li>
                        @guest
                            <li class="header__menu-item">
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="header__menu-item">
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="header__menu-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/home') }}">{{ __('MyPage') }}</a>
                                    <a class="dropdown-item" href="/logout"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </header>

        <main class="main" data-barba="wrapper">
            <div class="main__inner" data-barba="container" data-barba-namespace="pageName">
                <div class="hero">
                    <div class="hero__inner">
                        <h1 class="hero__ttl">@yield('hero__ttl')</h1>
                    </div>
                </div>
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="footer__inner">
                <div class="footer__copy">&copy; LOGO All Rights Reserved.</div>
            </div>
        </footer>
    </div>
</body>
</html>
