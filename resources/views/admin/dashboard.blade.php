@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

    <div class="space-y-8">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-6 sm:p-8 text-white shadow-xl">

            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-5">

                <div>

                    <h1 class="text-3xl sm:text-4xl font-bold">
                        👋 Dashboard Admin
                    </h1>

                    <p class="text-blue-100 mt-2 text-sm sm:text-base">
                        Kelola seluruh sistem CMS Blog Berita Anda.
                    </p>

                </div>

            </div>

        </div>



        {{-- STAT CARD --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">


            {{-- USER --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">
                            Total User
                        </p>

                        <h2 class="text-4xl font-bold text-gray-800 mt-3">
                            {{ $totalUser }}
                        </h2>

                    </div>


                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                        👥
                    </div>

                </div>

            </div>



            {{-- PENULIS --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">
                            Total Penulis
                        </p>

                        <h2 class="text-4xl font-bold text-gray-800 mt-3">
                            {{ $totalPenulis }}
                        </h2>

                    </div>


                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                        ✍️
                    </div>

                </div>

            </div>



            {{-- ARTIKEL --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">
                            Total Artikel
                        </p>

                        <h2 class="text-4xl font-bold text-gray-800 mt-3">
                            {{ $totalArtikel }}
                        </h2>

                    </div>


                    <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center text-3xl">
                        📰
                    </div>

                </div>

            </div>



            {{-- KATEGORI --}}
            <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">
                            Total Kategori
                        </p>

                        <h2 class="text-4xl font-bold text-gray-800 mt-3">
                            {{ $totalKategori }}
                        </h2>

                    </div>


                    <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl">
                        📂
                    </div>

                </div>

            </div>


        </div>




        {{-- QUICK MENU --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-5">
                ⚡ Menu Cepat
            </h2>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


                <a href="{{ route('admin.artikel.index') }}"
                    class="p-5 rounded-2xl bg-blue-50 hover:bg-blue-100 transition">

                    📰

                    <span class="block font-semibold mt-2">
                        Kelola Artikel
                    </span>

                </a>



                <a href="{{ route('admin.berita.index') }}"
                    class="p-5 rounded-2xl bg-green-50 hover:bg-green-100 transition">

                    📢

                    <span class="block font-semibold mt-2">
                        Kelola Berita
                    </span>

                </a>



                <a href="{{ route('admin.kategori.index') }}"
                    class="p-5 rounded-2xl bg-purple-50 hover:bg-purple-100 transition">

                    📂

                    <span class="block font-semibold mt-2">
                        Kategori
                    </span>

                </a>



                <a href="{{ route('admin.komentar.index') }}"
                    class="p-5 rounded-2xl bg-yellow-50 hover:bg-yellow-100 transition">

                    💬

                    <span class="block font-semibold mt-2">
                        Komentar
                    </span>

                </a>


            </div>

        </div>


    </div>

@endsection
