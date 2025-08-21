<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{asset("img/logo.png")}}" class="w-10">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-row justify-center items-center pt-1 sm:pt-0 bg-gradient-to-br from-green-400 to-emerald-500w-full gap-2">
            <div class="flex justify-center ">
                <div class="bg-white shadow-md overflow-hidden p-5 rounded-lg">
                    <div class="flex justify-center">
                        <a href="/" class="mx-auto my-2">
                            <img src="{{asset("img/logo.png")}}" alt="">
                        </a>
                    </div>
                    <h1 class="text-center font-bold text-2xl">
                        Universidad Tecnológica de Huejotzingo
                    </h1>
                    <div class="w-full flex justify-center">
                        <div class="w-full sm:max-w-md mt-6 px-6 py-3 sm:rounded-lg">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </body>
</html>
