<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand Name -->
        <a class="navbar-brand" href="{{route('index')}}">@lang('lang.ConnectFriend')</a>

        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home') ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">@lang('lang.Home')</a>
                </li>

                <!-- Authenticated Links -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('avatarPage') ? 'active' : ''}}" href="{{route('avatarPage')}}">@lang('lang.Avatar')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('friends') ? 'active' : ''}}" href="{{route('friends')}}">@lang('lang.Friend')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('friendRequest') ? 'active' : ''}}" href="{{route('friendRequest')}}">@lang('lang.Friend Request')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-lg-none {{request()->routeIs('setting') ? 'active' : ''}}" href="{{route('setting')}}">@lang('lang.Setting')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-lg-none" href="{{route('logout')}}">@lang('lang.Log Out')</a>
                    </li>

                    @if (Auth::user()->coin >= 0)
                        <li class="nav-item">
                            <a class="nav-link border border-1 border-light rounded-pill ps-3" href="{{route('topUpPage')}}">
                                <i class="bi bi-coin"></i> {{Auth::user()->coin}} <i class="bi bi-plus-lg"></i>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                            <li><a class="dropdown-item" href="{{route('setting')}}">@lang('lang.Setting')</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item fw-bold">@lang('lang.Log Out')</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                <!-- Guest Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">@lang('lang.Login')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">@lang('lang.Register')</a>
                    </li>

                    <li class="d-none d-lg-flex border border-1 rounded">
                        <a class="nav-link @if(session('locale') === 'en' || session('locale') == null) bg-primary fw-bold text-light @endif" href="{{route('setLocale', ['language' => 'en'])}}">EN</a>
                        <a class="nav-link @if(session('locale') === 'id') bg-primary fw-bold text-light @endif" href="{{route('setLocale', ['language' => 'id'])}}">ID</a>
                    </li>

                    <li class="d-flex d-lg-none">
                        <a class="nav-link @if(session('locale') === 'en' || session('locale') == null) active @endif" href="{{route('setLocale', ['language' => 'en'])}}">EN</a>
                        <a class="nav-link ms-3 @if(session('locale') === 'id') active @endif" href="{{route('setLocale', ['language' => 'id'])}}">ID</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
