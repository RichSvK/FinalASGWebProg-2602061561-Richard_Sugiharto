<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    {{-- Title --}}
    <title>@yield('title')</title>

    {{-- Style --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        #alert {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 10px 20px;
            border-radius: 5px;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .fade-out {
            animation: fadeOut 5s forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
    </style>
    @yield('custom_css')
</head>

<body>
    @php
        if($errors->any()){
            session()->flash('error', $errors->first());
        }
    @endphp

    @if(session('message') != '')
        <div class="alert alert-success fade-out" role="alert" id="alert">
            {{session('message')}}
            {{session()->forget('message')}}
        </div>
    @elseif(session('error') != '')
        <div class="alert alert-danger fade-out" role="alert" id="alert">
            {{session('error')}}
            {{session()->forget('error')}}
        </div>
    @endif

    @include('components.navbar')
    @yield('content')
    @yield('custom_js')

    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>

</html>
