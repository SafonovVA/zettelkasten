<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/notes.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/notes.css') }}" rel="stylesheet">
</head>
<body>
<div id="notes">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Zettelkasten notes</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                @endguest
            </ul>
            <!--Sidebar-->
            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Item 1</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link nav-link-collapse"
                        href="#"
                        id="hasSubItems"
                        data-toggle="collapse"
                        data-target="#collapseSubItems2"
                        aria-controls="collapseSubItems2"
                        aria-expanded="false"
                    >Item 2</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#navAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 2.1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 2.2</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Item 3</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link nav-link-collapse"
                        href="#"
                        id="hasSubItems"
                        data-toggle="collapse"
                        data-target="#collapseSubItems4"
                        aria-controls="collapseSubItems4"
                        aria-expanded="false"
                    >Item 4</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems4" data-parent="#navAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 4.1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 4.2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 4.2</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Item 5</a>
                </li>
            </ul>
            {{--<form class="form-inline ml-auto mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>--}}
        </div>
    </nav>

    <main class="content-wrapper">
        <div class="container-fluid">
            <h1>Main Content</h1>
        </div>
    </main>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <span>Coded by <a href="https://si-dev.com/ru">SI-Dev</a>, 2018</span>
            </div>
        </div>
    </footer>

</div>
</body>
</html>
