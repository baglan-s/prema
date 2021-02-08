<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Welcome!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm font-weight-bold" style="background-color:#29347A !important;">
                <div class="container">
                    <a class="navbar-brand text-white" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

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
                                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    {{ __('Welcome!') }}<big>&nbsp;</big>
                                </div>
                                <div class="card-body">
                                    <h6 class="font-weight-bold"><a href="{{ url('/home') }}">Go to Dashboard</a></h6>
                                    <hr style="height:0; border-top:2px solid #f2f2f2">
                                    <h6 class="mt-4 font-weight-bold">Downloads:</h6>
                                    <ul class="navbar-nav ml-auto font-weight-bold">
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="{{ route('download', 'property-feed-v0.1.xml') }}">property-feed-v0.1.xml</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="{{ route('download', 'property-feed-description-v0.1.txt') }}">property-feed-description-v0.1.txt</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="{{ route('download', 'property-feed-v0.2.xml') }}">property-feed-v0.2.xml</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="{{ route('download', 'property-feed-description-v0.2.txt') }}">property-feed-description-v0.2.txt</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="{{ route('download', 'property-feed-v1.1.xml') }}">property-feed-v1.1.xml</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="{{ route('download', 'property-feed-description-v1.1.txt') }}">property-feed-description-v1.1.txt</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </main>

        </div>
    </body>
</html>
