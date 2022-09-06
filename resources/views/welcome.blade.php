<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div class="flex flex-col">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="mb-8 font-bold text-4xl text-center">Questionnaire</h1>
                @if(Route::has('login'))
                    <div class="flex flex-col justify-center sm:flex-row sm:flex-wrap sm:space-x-16">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-sm py-2 w-52 text-center bg-blue-500 hover:opacity-80 transition-all text-lg font-bold text-white">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-sm py-2 w-52 text-center bg-blue-500 hover:opacity-80 transition-all text-lg font-bold text-white">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-sm py-2 w-52 text-center bg-blue-500 hover:opacity-80 transition-all text-lg font-bold text-white">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
