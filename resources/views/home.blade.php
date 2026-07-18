@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

<!-- Hero -->
<section class="bg-gradient-to-r from-slate-50 to-blue-50 py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Text -->
            <div>

                <p class="uppercase tracking-[4px] text-blue-600 font-semibold mb-6">
                    Portal Berita Terpercaya
                </p>

                <h1 class="text-5xl md:text-6xl font-black leading-tight text-gray-900">

                    Dapatkan

                    <span class="text-blue-600">
                        Informasi
                    </span>

                    dan Berita
                    Terbaru Setiap Hari

                </h1>

                <p class="mt-8 text-lg text-gray-600 leading-8">

                    Sudiang Info menyajikan berita nasional,
                    daerah, pendidikan, teknologi, olahraga,
                    ekonomi serta informasi masyarakat yang
                    cepat, akurat dan terpercaya.

                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a href="#berita"
                        class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-xl font-semibold">

                        Baca Berita

                    </a>

                    <a href="{{ url('/tentang') }}"
                        class="border border-gray-300 hover:bg-gray-100 px-8 py-4 rounded-xl font-semibold">

                        Tentang Kami

                    </a>

                </div>

                <!-- Statistik -->

                <div class="grid grid-cols-3 gap-6 mt-14">

                    <div>

                        <h2 class="text-4xl font-bold text-gray-900">
                            500+
                        </h2>

                        <p class="text-gray-500">
                            Artikel
                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-bold text-gray-900">
                            50+
                        </h2>

                        <p class="text-gray-500">
                            Kategori
                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-bold text-gray-900">
                            10K+
                        </h2>

                        <p class="text-gray-500">
                            Pembaca
                        </p>

                    </div>

                </div>

            </div>

            <!-- Hero Image -->

            <div class="relative">

                <div class="bg-blue-700 rounded-3xl p-6 shadow-2xl">

                    <img
                        src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=1200"
                        class="rounded-2xl w-full object-cover">

                </div>

                <div class="absolute -top-5 left-8 bg-white rounded-xl shadow-lg px-5 py-4">

                    <h4 class="font-bold text-gray-800">
                        Berita Terverifikasi
                    </h4>

                    <p class="text-gray-500 text-sm">
                        Update setiap hari
                    </p>

                </div>

                <div class="absolute -bottom-5 right-8 bg-white rounded-xl shadow-lg px-5 py-4">

                    <h4 class="font-bold text-blue-600">
                        100+
                    </h4>

                    <p class="text-gray-500 text-sm">
                        Berita Hari Ini
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Kategori -->

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <h2 class="text-4xl font-bold">
                Kategori Berita
            </h2>

            <p class="text-gray-500 mt-3">
                Temukan berita sesuai minat Anda.
            </p>

        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @php

            $kategori = [
                'Politik',
                'Teknologi',
                'Pendidikan',
                'Olahraga'
            ];

            @endphp

            @foreach($kategori as $item)

            <div
                class="bg-gray-50 rounded-2xl p-8 text-center shadow hover:shadow-xl hover:-translate-y-2 transition">

                <div
                    class="w-16 h-16 mx-auto bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-2xl font-bold">

                    {{ substr($item,0,1) }}

                </div>

                <h3 class="mt-5 font-bold text-xl">

                    {{ $item }}

                </h3>

                <p class="text-gray-500 mt-2">

                    Berita terbaru seputar {{ strtolower($item) }}

                </p>

            </div>

            @endforeach

        </div>

    </div>

</section>

<!-- Berita -->

<section id="berita" class="py-20 bg-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-10">

            <h2 class="text-4xl font-bold">

                Berita Terbaru

            </h2>

            <a href="#" class="text-blue-600 font-semibold">

                Lihat Semua →

            </a>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @for($i=1;$i<=6;$i++)

            <div
                class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl transition">

                <img
                    src="https://picsum.photos/600/400?random={{ $i }}"
                    class="w-full h-56 object-cover">

                <div class="p-6">

                    <span
                        class="inline-block bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">

                        Teknologi

                    </span>

                    <h3 class="mt-4 text-2xl font-bold">

                        Judul Berita {{ $i }}

                    </h3>

                    <p class="text-gray-500 mt-3 leading-7">

                        Ringkasan berita akan tampil di sini agar
                        pembaca mengetahui isi berita sebelum
                        membuka detail artikel.

                    </p>

                    <a href="#"
                        class="inline-block mt-6 text-blue-600 font-semibold">

                        Baca Selengkapnya →

                    </a>

                </div>

            </div>

            @endfor

        </div>

    </div>

</section>

<!-- CTA -->

<section class="py-20 bg-blue-700 text-white">

    <div class="max-w-5xl mx-auto px-6 text-center">

        <h2 class="text-5xl font-bold">

            Selalu Update Bersama
            Sudiang Info

        </h2>

        <p class="mt-6 text-blue-100 text-lg">

            Dapatkan informasi terbaru setiap hari
            dari berbagai kategori berita terpercaya.

        </p>


    </div>

</section>

@endsection