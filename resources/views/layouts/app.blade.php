<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('affiliateByArafatAssets/css/bootstrap.min.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('affiliateByArafatAssets/css/themeCustom.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('affiliateByArafatAssets/css/daterangepicker.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('affiliateByArafatAssets/css/jquery.dataTables.min.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('affiliateByArafatAssets/css/custom.css') }}"  rel="stylesheet">
    
    <script src="{{ URL::asset('affiliateByArafatAssets/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('affiliateByArafatAssets/js/clipboard.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listAffiliateGroup') }}">{{ __('Affiliate Group') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listAffiliatePerson') }}">{{ __('Affiliate Person') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('affiliatePersonPage') }}">{{ __('Affiliate Fornt Page') }}</a>
                        </li>
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
            <!-- flash message -->
            @if(Session::has('message'))
            <div class="offset-md-1 col-md-8" style="padding-left: 60px;">
                <div class="alert alert-dismissible alert-success">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4 class="alert-heading text-dark text-center">{{Session::get("message")}}</h4>
            <!--       <p class="mb-0">Message Goes Here ..</p> -->
                </div>
            </div>
            @endif
            <!-- end falsh message -->
            @yield('content')
        </main>
    </div>

    <script src="{{ URL::asset('affiliateByArafatAssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('affiliateByArafatAssets/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('affiliateByArafatAssets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ URL::asset('affiliateByArafatAssets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('affiliateByArafatAssets/js/themeCustom.js') }}"></script>
    <script src="{{ URL::asset('affiliateByArafatAssets/js/custom.js') }}"></script>
</body>
</html>
