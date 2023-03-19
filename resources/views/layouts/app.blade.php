<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>

    <nav id="app" class="d-flex bg-dark justify-content-center align-items-end shadow-sm" data-bs-theme="dark">
        <ul class="nav nav-tabs">
            <li class="nav-item links">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </li>
            <li class="nav-item links">
                <a class="nav-link link-light" href="/"><i class="fas fa-house"></i></a>
            </li>
            <li class="nav-item links">
                <a class="nav-link link-light" href="{{ route('products.index') }}"><i class="fa fa-table"
                        aria-hidden="true"></i></a>
            </li>
            <li class="nav-item links">
                <a class="nav-link link-light" href="/fallback/error"><i class="fas fa-circle-exclamation"></i></a>
            </li>
            <li class="nav-item dropdown links">
                @guest
                    <a class="nav-link dropdown-toggle text-danger" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Guest</a>
                    <ul class="dropdown-menu">
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
                    </ul>
                @else
                    <a class="nav-link dropdown-toggle text-warning" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li class="links">
                            <a class="dropdown-item" href="{{ route('profile') }}" onclick="">
                                {{ __('profile') }}
                            </a>
                        </li>
                        <li class="links">
                            <hr class="dropdown-divider">
                        </li>
                        <li class="links">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                @endguest
            </li>
        </ul>
    </nav>


    <main class="h-75s full-height">
        <div class="d-flex mt-1">
            @guest
            @else
                <div class="sidebar flex-shrink-1">
                    <ul>
                        @if (auth()->user()->role == 'admin')
                            <li class="links"><a href="{{ route('products.create') }}">create new</a></li>
                            <hr class="m-1">
                        @endif
                        @php
                            $products = DB::select('select * from products');
                            foreach ($products as $product) {
                                echo "<li  class=\"links\"><a href=\"" . route('products.show', $product->id) . '"">' . $product->id . ' ' . $product->title . '</a></li>';
                            }
                        @endphp
                    </ul>
                </div>
            @endguest
            <div class="flex-grow-1 text-center">
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <div class="p-3 container-fluid bg bg-dark text-center text-light position-relative bottom-0">
            <i class="fa fa-copyright" aria-hidden="true"></i> copyright 2023
        </div>
    </footer>
</body>

</html>
