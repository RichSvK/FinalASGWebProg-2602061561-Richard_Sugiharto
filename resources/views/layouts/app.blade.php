<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('custom_css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark">
            <div class="d-flex justify-content-between w-100 ps-3">
                <a class="navbar-brand">Job Richard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                        </li>

                        @guest
                            <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
                            <li><a class="nav-link" href="{{route('register')}}">Register</a></li>
                        @endguest

                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('avatarPage')}}">Avatar</a>
                            </li>

                            <li><a class="nav-link d-lg-none" href="#">Setting</a></li>
                            <li><a class="nav-link d-lg-none" href="{{route('logout')}}">Log Out</a></li>

                            <li class="border border-1 border-light rounded-pill"><a class="nav-link" href="{{route('topUpPage')}}"><i class="bi bi-coin"></i> {{Auth::user()->coin}} <i class="bi bi-plus-lg"></i></a></li>

                            <li class="nav-item dropdown d-none d-lg-block me-3">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    @auth
                                        <li><a class="dropdown-item" href="#">Setting</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{route('logout')}}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item fw-bold">Log Out</button>
                                            </form>
                                        </li>
                                    @endauth
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    @yield('custom_js')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
