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
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <!-- Font Awesome  -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-white shadow-sm py-4">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold no-underline">
                        Questionnaire
                    </a>
                </div>
                <nav class="space-x-6 text-sm sm:text-base font-bold">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        @if (auth()->user()->role <= 5)
                            <a href="{{ route('questionnaire.create') }}" class="no-underline hover:underline text-sm">
                                アンケート管理
                            </a>
                        @else 
                            <span class="">{{ Auth::user()->name }}</span>
                        @endif

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        <div class="pt-10 pb-20">
            @yield('content')
        </div>
    </div>
    
</body>
</html>
