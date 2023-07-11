<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CLOUD SHARE') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                @if (session('status'))
                    <div class="text-green-500 px-4 py-2 rounded">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="text-green-500 px-4 py-2 rounded">
                        {{ session('message') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
   <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfHR6kaDCXB9dtIhbwvITrjeSMw4xZ6V8&callback=initAllMaps" async defer></script>-->
    </body>
</html>
