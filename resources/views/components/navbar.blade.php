<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand Name -->
        <a class="navbar-brand" href="#">Job Richard</a>

        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>

                <!-- Authenticated Links -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('avatarPage') }}">Avatar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friends') }}">Friends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friendRequest') }}">Friend Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-lg-none" href="{{ route('setting') }}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-lg-none" href="{{ route('logout') }}">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-1 border-light rounded-pill ps-3" href="{{ route('topUpPage') }}">
                            <i class="bi bi-coin"></i> {{ Auth::user()->coin }} <i class="bi bi-plus-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                            <li><a class="dropdown-item" href="{{ route('setting') }}">Setting</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item fw-bold">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                <!-- Guest Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
