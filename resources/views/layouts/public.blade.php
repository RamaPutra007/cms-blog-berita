<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sudiang Info')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gray-50 font-sans antialiased">

    {{-- Navbar --}}
    @include('partial.navbar')

    {{-- Content --}}
    <main class="min-h-screen">

        @yield('content')

    </main>

    {{-- Footer --}}
    @include('partial.footer')


    {{-- Success Alert --}}
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({

                    toast: true,

                    position: 'top-end',

                    icon: 'success',

                    title: '{{ session('success') }}',

                    showConfirmButton: false,

                    timer: 3000,

                    timerProgressBar: true,

                    background: '#ffffff',

                    color: '#111827',

                    iconColor: '#16a34a',

                    customClass: {

                        popup: 'rounded-2xl shadow-2xl'

                    }

                });

            });
        </script>
    @endif


    {{-- Error Alert --}}
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({

                    toast: true,

                    position: 'top-end',

                    icon: 'error',

                    title: '{{ session('error') }}',

                    showConfirmButton: false,

                    timer: 3000,

                    timerProgressBar: true,

                    background: '#ffffff',

                    color: '#111827',

                    iconColor: '#dc2626',

                    customClass: {

                        popup: 'rounded-2xl shadow-2xl'

                    }

                });

            });
        </script>
    @endif


    {{-- Warning Alert --}}
    @if (session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({

                    toast: true,

                    position: 'top-end',

                    icon: 'warning',

                    title: '{{ session('warning') }}',

                    showConfirmButton: false,

                    timer: 3000,

                    timerProgressBar: true,

                    background: '#ffffff',

                    color: '#111827',

                    iconColor: '#f59e0b',

                    customClass: {

                        popup: 'rounded-2xl shadow-2xl'

                    }

                });

            });
        </script>
    @endif


    {{-- Login Berhasil --}}
    @if (session('login_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: '{{ session('login_success') }}',
                    confirmButtonText: 'Lanjutkan',
                    confirmButtonColor: '#2563eb',
                    background: '#ffffff',
                    color: '#111827',
                    width: '420px',
                    showClass: {
                        popup: 'animate__animated animate__zoomIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                    }
                });

            });
        </script>
    @endif


    {{-- Logout Berhasil --}}
    @if (session('logout_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Logout Berhasil',
                    text: '{{ session('logout_success') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#16a34a',
                    background: '#ffffff',
                    color: '#111827',
                    width: '420px',
                    showClass: {
                        popup: 'animate__animated animate__zoomIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                    }
                });

            });
        </script>
    @endif

</body>

</html>
