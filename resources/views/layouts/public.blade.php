<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Sudiang Info')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-50 font-sans">

    @include('partials.navbar')

    <main>

        @yield('content')

    </main>

    @include('partials.footer')

</body>

</html>