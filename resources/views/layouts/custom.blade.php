<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title ?? 'Prema Pro' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    @stack('block-styles')
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <header>
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 col-sm-6 col-6">
                    <div class="user-action">
                        @auth
                        <form action="{{ route('logout') }}" class="header-logout-form" method="post">
                            @csrf
                            <input type="submit" value="LogOut">
                        </form>
                        @endauth
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 d-md-block d-none">
                    <div class="account-info d-flex justify-content-center">
                        @auth
                        <p class="mb-0">Account name: {{ auth()->user()->email ?? 'User' }}</p>
                        @endauth
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <div class="header-icon-menu d-flex justify-content-end">
                        <a href="" class="icon-menu-item">
                            <img src="{{ asset('img/phone-icon.png') }}" alt="">
                        </a>
                        <a href="" class="icon-menu-item">
                            <img src="{{ asset('img/edit-icon.png') }}" alt="">
                        </a>
                        <a href="" class="icon-menu-item">
                            <img src="{{ asset('img/gear-icon.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper py-4">
            @yield('content')
        </div>
        <div class="loader">
            <div class="l_main">
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
            </div>
        </div>
        @component('components.exports.export-filter') @endcomponent
    </main>
    <footer>
        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="owner-name d-flex justify-content-center">
                    <a href="">Prema pro</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
@stack('block-scripts')

</body>
</html>
