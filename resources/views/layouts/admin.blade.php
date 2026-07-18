<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Dashboard Admin')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('partial.sidebar')

    <div class="flex-1 flex flex-col">


        {{-- Content --}}
        <main class="flex-1 p-6">

            @if(session('success'))
            <div class="mb-6 flex items-center gap-3
            bg-green-100
            border border-green-300
            text-green-700
            px-5 py-4
            rounded-xl">


                ✅

                <span>

                    {{ session('success') }}

                </span>


            </div>


            @endif

            @if(session('error'))

            <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">

                {{ session('error') }}

            </div>

            @endif
            @yield('content')

        </main>

        {{-- Footer --}}
        @include('partial.footer')

    </div>

</div>

</body>

</html>