<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Sudiang Info')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-50 font-sans">

    @include('partial.navbar')

    <main class="min-h-screen">

        @yield('content')

    </main>

    @include('partial.footer')

</body>

</html>