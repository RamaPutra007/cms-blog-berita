@extends('layouts.public')

@section('title', 'Beranda')


@section('content')


    {{-- HERO --}}
    <section class="bg-gradient-to-r from-slate-50 to-blue-50 py-20">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-2 gap-16 items-center">


                {{-- TEXT --}}
                <div>


                    <p class="uppercase tracking-[4px] text-blue-600 font-semibold mb-6">
                        Portal Berita Terpercaya
                    </p>



                    <h1 class="text-5xl md:text-6xl font-black leading-tight text-gray-900">

                        Dapatkan

                        <span class="text-blue-600">
                            Informasi
                        </span>

                        dan Berita Terbaru Setiap Hari

                    </h1>




                    <p class="mt-8 text-lg text-gray-600 leading-8">

                        Sudiang Info menyajikan berita dan artikel
                        terbaru yang cepat, akurat dan terpercaya.

                    </p>



                    <div class="mt-10 flex flex-wrap gap-4">


                        <a href="#berita" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-semibold">

                            Baca Berita

                        </a>



                        <a href="{{ route('tentang') }}"
                            class="border border-gray-300 px-8 py-4 rounded-xl font-semibold hover:bg-gray-100">

                            Tentang Kami

                        </a>


                    </div>





                    {{-- STATISTIK --}}

                    <div class="grid grid-cols-3 gap-6 mt-14">


                        <div>

                            <h2 class="text-4xl font-bold">
                                {{ $berita->count() }}
                            </h2>

                            <p class="text-gray-500">
                                Berita
                            </p>

                        </div>



                        <div>

                            <h2 class="text-4xl font-bold">
                                {{ $artikel->count() }}
                            </h2>

                            <p class="text-gray-500">
                                Artikel
                            </p>

                        </div>




                        <div>

                            <h2 class="text-4xl font-bold">
                                {{ $kategori->count() }}
                            </h2>

                            <p class="text-gray-500">
                                Kategori
                            </p>

                        </div>


                    </div>


                </div>







                {{-- IMAGE --}}

                <div class="relative">


                    <div class="bg-blue-700 rounded-3xl p-6 shadow-xl">


                        <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e"
                            class="rounded-2xl w-full h-[450px] object-cover">


                    </div>




                    <div class="absolute top-5 left-5 bg-white shadow rounded-xl px-5 py-4">

                        <h4 class="font-bold">
                            Berita Terverifikasi
                        </h4>


                        <p class="text-sm text-gray-500">
                            Update setiap hari
                        </p>

                    </div>



                </div>



            </div>

        </div>

    </section>









    {{-- KATEGORI --}}

    <section class="py-20 bg-white">


        <div class="max-w-7xl mx-auto px-6">


            <div class="text-center mb-12">


                <h2 class="text-4xl font-bold">
                    Kategori Berita
                </h2>


                <p class="text-gray-500 mt-3">
                    Pilih kategori berita yang Anda inginkan
                </p>


            </div>





            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">


                @forelse($kategori as $item)
                    <a href="{{ route('kategori.show', $item->slug) }}"
                        class="bg-gray-50 rounded-2xl p-8 text-center shadow hover:shadow-xl hover:-translate-y-2 transition">


                        <div
                            class="w-16 h-16 mx-auto rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-2xl font-bold">

                            {{ strtoupper(substr($item->nama, 0, 1)) }}

                        </div>



                        <h3 class="mt-5 text-xl font-bold">

                            {{ $item->nama }}

                        </h3>



                        <p class="text-gray-500 mt-2">

                            Lihat berita {{ strtolower($item->nama) }}

                        </p>



                    </a>



                @empty


                    <p class="text-gray-400">
                        Belum ada kategori
                    </p>
                @endforelse


            </div>


        </div>


    </section>









    {{-- BERITA TERBARU --}}

    <section id="berita" class="py-20 bg-gray-100">


        <div class="max-w-7xl mx-auto px-6">



            <div class="flex justify-between items-center mb-10">


                <h2 class="text-4xl font-bold">
                    Berita Terbaru
                </h2>


                <a href="{{ route('berita.index') }}" class="text-blue-600 font-semibold">

                    Lihat Semua →

                </a>


            </div>






            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">



                @forelse($berita as $item)
                    <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition">



                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-56 object-cover">
                        @else
                            <div class="h-56 bg-gray-200 flex items-center justify-center">

                                Tidak ada gambar

                            </div>
                        @endif






                        <div class="p-6">



                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">

                                {{ $item->kategori->nama ?? '-' }}

                            </span>




                            <h3 class="text-xl font-bold mt-4">

                                {{ $item->judul }}

                            </h3>




                            <p class="text-gray-500 mt-3">

                                {{ Str::limit($item->isi, 120) }}

                            </p>




                            <a href="{{ route('berita.show', $item->slug) }}"
                                class="inline-block mt-5 text-blue-600 font-semibold">

                                Baca Selengkapnya →

                            </a>



                        </div>



                    </div>



                @empty


                    <p class="text-gray-400">

                        Belum ada berita publish

                    </p>
                @endforelse



            </div>


        </div>


    </section>









    {{-- ARTIKEL BLOG --}}

    <section class="py-20 bg-white">


        <div class="max-w-7xl mx-auto px-6">



            <div class="flex justify-between items-center mb-10">


                <h2 class="text-4xl font-bold">

                    Artikel Terbaru

                </h2>



                <a href="{{ route('blog.index') }}" class="text-blue-600 font-semibold">

                    Lihat Semua →

                </a>


            </div>






            <div class="grid md:grid-cols-3 gap-8">



                @forelse($artikel as $item)
                    <div class="bg-gray-50 rounded-3xl shadow p-6">



                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-52 object-cover rounded-2xl">
                        @endif





                        <h3 class="text-xl font-bold mt-5">

                            {{ $item->judul }}

                        </h3>




                        <p class="text-gray-500 mt-3">

                            {{ Str::limit($item->isi, 100) }}

                        </p>




                        <a href="{{ route('blog.show', $item->slug) }}"
                            class="inline-block mt-5 text-blue-600 font-semibold">

                            Baca Artikel →

                        </a>



                    </div>



                @empty


                    <p class="text-gray-400">
                        Belum ada artikel publish
                    </p>
                @endforelse



            </div>


        </div>


    </section>










    {{-- CTA --}}

    <section class="py-20 bg-blue-700 text-white">


        <div class="max-w-5xl mx-auto px-6 text-center">


            <h2 class="text-5xl font-bold">

                Selalu Update Bersama Sudiang Info

            </h2>



            <p class="mt-6 text-blue-100 text-lg">

                Informasi terbaru dari berbagai kategori terpercaya.

            </p>


        </div>


    </section>



@endsection
