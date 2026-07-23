@extends('layouts.admin')

@section('title', 'Detail Pengguna')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">


            {{-- HEADER --}}

            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-8 md:px-10 md:py-10 text-white">


                <div class="flex items-center justify-between gap-6">


                    <div>

                        <h1 class="text-3xl md:text-4xl font-black">
                            Detail Pengguna
                        </h1>

                        <p class="mt-2 text-blue-100">
                            Informasi lengkap akun pengguna sistem.
                        </p>

                    </div>



                    {{-- FOTO PROFIL --}}

                    <div
                        class="w-24 h-24 md:w-28 md:h-28 rounded-full overflow-hidden border-4 border-white/40 bg-white/20 shadow-xl flex items-center justify-center shrink-0">


                        @if ($user->foto)
                            <img src="{{ asset('storage/' . 'profile/' . $user->foto) }}" alt="{{ $user->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <span class="text-5xl font-black text-white">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        @endif


                    </div>


                </div>


            </div>





            {{-- BODY --}}

            <div class="p-6 md:p-10">


                <div class="grid md:grid-cols-2 gap-6">



                    {{-- NAMA --}}

                    <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-md transition">

                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                            Nama Pengguna
                        </p>

                        <p class="mt-3 text-xl font-bold text-gray-900">
                            {{ $user->name }}
                        </p>

                    </div>





                    {{-- EMAIL --}}

                    <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-md transition">

                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                            Email
                        </p>

                        <p class="mt-3 text-xl font-bold text-gray-900 break-all">
                            {{ $user->email }}
                        </p>

                    </div>





                    {{-- ROLE --}}

                    <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-md transition">

                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                            Role
                        </p>


                        <span
                            class="inline-flex mt-3 px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold capitalize">

                            {{ $user->role }}

                        </span>


                    </div>





                    {{-- TANGGAL --}}

                    <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-md transition">


                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                            Dibuat Pada
                        </p>


                        <p class="mt-3 text-xl font-bold text-gray-900">

                            {{ $user->created_at->format('d M Y H:i') }}

                        </p>


                    </div>



                </div>






                {{-- BUTTON --}}

                <div class="mt-10 flex flex-col sm:flex-row gap-4">


                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-gray-900 hover:bg-gray-700 text-white font-semibold transition">

                        ← Kembali

                    </a>




                    <a href="{{ route('admin.users.edit', $user->id) }}"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

                        ✏ Edit Pengguna

                    </a>


                </div>


            </div>



        </div>


    </div>


@endsection
