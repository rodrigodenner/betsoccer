<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-gray-200">
<div class="py-12 ">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="mr-12 md:mr-0 p-4 sm:p-8 rounded-lg bg-white  shadow sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>


@livewireScripts
</body>
</html>
