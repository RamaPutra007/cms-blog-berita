<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-4 sm:p-6">


        <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden grid lg:grid-cols-2">



            {{-- LEFT BRANDING --}}

            <div
                class="hidden lg:flex flex-col justify-between p-12 xl:p-16 bg-gradient-to-br from-blue-950 via-blue-800 to-indigo-900 text-white">


                <div>

                    <a href="{{ route('home') }}" class="group">

                        <h1 class="text-3xl font-black group-hover:text-blue-200 transition">
                            Sudiang Info
                        </h1>

                        <p class="mt-2 text-blue-200">
                            CMS Dashboard
                        </p>

                    </a>

                </div>




                <div>

                    <span class="inline-flex px-4 py-2 rounded-full bg-white/10 text-sm mb-6">
                        Selamat Datang Kembali
                    </span>


                    <h2 class="text-5xl font-black leading-tight">
                        Kelola informasi lebih mudah dan cepat.
                    </h2>


                    <p class="mt-6 text-lg text-blue-100 leading-relaxed">
                        Masuk ke dashboard untuk mengelola artikel,
                        kategori, berita dan data website dengan aman.
                    </p>


                </div>




                <p class="text-blue-200 text-sm">
                    © {{ date('Y') }} Sudiang Info
                </p>



            </div>









            {{-- LOGIN --}}

            <div class="p-6 sm:p-10 lg:p-16 flex items-center">


                <div class="w-full max-w-md mx-auto">



                    {{-- ICON --}}

                    <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center mb-6">


                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12H3m12 0-4-4m4 4-4 4M17 7h2a2 2 0 012 2v6a2 2 0 01-2 2h-2" />

                        </svg>


                    </div>




                    <h2 class="text-3xl font-black text-gray-900">
                        Login Akun
                    </h2>


                    <p class="mt-3 mb-8 text-gray-500">
                        Masukkan email dan password untuk melanjutkan.
                    </p>








                    <form method="POST" action="{{ route('login') }}" class="space-y-5">

                        @csrf





                        {{-- ERROR --}}

                        @if ($errors->any())
                            <div
                                class="flex items-center gap-3 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl text-sm">

                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8v4m0 4h.01M10.29 3.86l-8.82 15a2 2 0 001.71 3h17.64a2 2 0 001.71-3l-8.82-15a2 2 0 00-3.42 0z" />

                                </svg>


                                <span>
                                    Email atau password salah.
                                </span>


                            </div>
                        @endif







                        {{-- EMAIL --}}

                        <div>


                            <label class="text-sm font-semibold text-gray-700">
                                Email Address
                            </label>



                            <div class="relative mt-2">


                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2" />

                                </svg>



                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="nama@email.com"
                                    class="w-full h-14 pl-12 rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                                    required autofocus>


                            </div>




                            @error('email')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror


                        </div>









                        {{-- PASSWORD --}}

                        <div>


                            <label class="text-sm font-semibold text-gray-700">
                                Password
                            </label>



                            <div class="relative mt-2">


                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8" />

                                </svg>





                                <input id="password" type="password" name="password" placeholder="••••••••"
                                    class="w-full h-14 pl-12 pr-12 rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                                    required>






                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600 transition">


                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">


                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />


                                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />


                                    </svg>


                                </button>


                            </div>



                        </div>









                        {{-- OPTION --}}

                        <div class="flex justify-between items-center">


                            <label class="flex items-center gap-2 text-sm text-gray-600">


                                <input type="checkbox" name="remember" class="rounded border-gray-300">


                                Ingat saya


                            </label>




                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">

                                    Lupa password?

                                </a>
                            @endif


                        </div>







                        {{-- BUTTON --}}

                        <button
                            class="w-full h-14 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-lg shadow-blue-500/30 transition">

                            Masuk Sekarang

                        </button>




                    </form>



                </div>


            </div>



        </div>



    </div>




    <script>
        function togglePassword() {

            const password = document.getElementById('password');

            password.type = password.type === 'password' ?
                'text' :
                'password';

        }
    </script>



</x-guest-layout>
