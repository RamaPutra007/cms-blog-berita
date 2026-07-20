<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard Admin')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-100">

    <div class="min-h-screen flex">

        {{-- SIDEBAR DESKTOP --}}
        @include('partial.admin.sidebar')

        <div class="flex-1 flex flex-col lg:ml-72">

            {{-- NAVBAR MOBILE --}}
            @include('partial.admin.navbar')

            <main class="flex-1 p-4 md:p-6 lg:p-8">

                @if (session('success'))
                    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-700">

                        {{ session('success') }}

                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">

                        {{ session('error') }}

                    </div>
                @endif

                @yield('content')

            </main>

            {{-- FOOTER --}}
            @include('partial.admin.footer')

        </div>

    </div>

</body>

</html>
