<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Penulis')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-100">

    {{-- Navbar Mobile --}}
    @include('partial.penulis.navbar')

    <div class="flex">

        {{-- Sidebar --}}
        @include('partial.penulis.sidebar')

        {{-- Content --}}
        <div class="flex-1 lg:ml-72 min-h-screen flex flex-col">

            <main class="flex-1 p-4 md:p-6">

                @yield('content')

            </main>

            @include('partial.penulis.footer')

        </div>

    </div>

</body>

</html>
