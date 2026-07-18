@extends('layouts.app')

@section('title','Beranda')

@section('content')

<!-- Hero -->
<section class="bg-gradient-to-r from-white to-blue-50">

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Kiri -->
            <div>

                <span class="uppercase tracking-[4px] text-blue-600 font-semibold">
                    Portal Berita Digital
                </span>

                <h1 class="mt-6 text-5xl lg:text-7xl font-extrabold leading-tight text-gray-900">

                    Dapatkan

                    <span class="text-blue-600">
                        Berita
                    </span>

                    Terbaru
                    Setiap Hari

                </h1>

                <p class="mt-8 text-lg text-gray-600 leading-9">

                    Sudiang Info merupakan portal berita digital yang
                    menyajikan informasi nasional, teknologi,
                    pendidikan, olahraga, ekonomi serta berbagai berita
                    terpercaya lainnya.

                </p>

                <div class="mt-10 flex flex-wrap gap-5">

                    <a href="#"

                        class="px-8 py-4 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">

                        Jelajahi Berita

                    </a>

                    <a href="{{ route('tentang') }}"

                        class="px-8 py-4 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                        Tentang Kami

                    </a>

                </div>

                <div class="grid grid-cols-3 gap-8 mt-16">

                    <div>

                        <h2 class="text-4xl font-bold">
                            500+
                        </h2>

                        <p class="text-gray-500">
                            Artikel
                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-bold">
                            50+
                        </h2>

                        <p class="text-gray-500">
                            Kategori
                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-bold">
                            10K+
                        </h2>

                        <p class="text-gray-500">
                            Pembaca
                        </p>

                    </div>

                </div>

            </div>

            <!-- Kanan -->

            <div>

                <div class="relative">

                    <div class="rounded-3xl bg-gradient-to-br from-blue-700 to-blue-500 shadow-2xl overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900"
                            class="w-full h-full object-cover opacity-90">

                    </div>

                    <!-- Card -->

                    <div class="absolute -top-6 left-5 bg-white rounded-2xl shadow-xl px-6 py-4">

                        <h4 class="font-bold">
                            Berita Terbaru
                        </h4>

                        <p class="text-gray-500 text-sm">
                            Update setiap hari
                        </p>

                    </div>

                    <div class="absolute -bottom-6 right-5 bg-white rounded-2xl shadow-xl px-6 py-4">

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                            Online

                        </span>

                        <p class="mt-2 text-sm">

                            Informasi selalu diperbarui

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Berita -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-10">

            <div>

                <p class="uppercase tracking-widest text-blue-600 font-semibold">

                    Berita

                </p>

                <h2 class="text-4xl font-bold">

                    Berita Terbaru

                </h2>

            </div>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @for($i=1;$i<=6;$i++)

            <div class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl transition duration-300">

                <img
                    src="https://picsum.photos/600/400?random={{ $i }}"
                    class="h-56 w-full object-cover">

                <div class="p-6">

                    <span class="text-blue-600 text-sm font-semibold">

                        Teknologi

                    </span>

                    <h3 class="text-2xl font-bold mt-3">

                        Judul Berita {{ $i }}

                    </h3>

                    <p class="mt-4 text-gray-600 leading-7">

                        Ringkasan berita ditampilkan di sini agar
                        pengunjung mengetahui isi berita sebelum membaca
                        selengkapnya.

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

<!-- Kategori -->

<section class="bg-blue-600 py-20">

    <div class="max-w-7xl mx-auto px-6 text-center text-white">

        <h2 class="text-4xl font-bold">

            Jelajahi Berbagai Kategori

        </h2>

        <p class="mt-5 text-blue-100">

            Politik, Pendidikan, Teknologi, Olahraga, Ekonomi,
            Kesehatan, Hiburan dan lainnya.

        </p>

        <div class="mt-12 flex flex-wrap justify-center gap-5">

            @foreach([
            'Nasional',
            'Teknologi',
            'Pendidikan',
            'Olahraga',
            'Ekonomi',
            'Lifestyle'
            ] as $kategori)

            <span class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold">

                {{ $kategori }}

            </span>

            @endforeach

        </div>

    </div>

</section>

@endsection