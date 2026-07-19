@extends('layouts.public')

@section('title', 'Tentang')

@section('content')


    {{-- HERO --}}
    <section class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-16 md:py-24">

        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

            <div class="max-w-4xl">

                <span class="inline-flex px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                    TENTANG KAMI
                </span>


                <h1 class="mt-6 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-gray-900">

                    Tentang
                    <span class="text-blue-600">
                        Sudiang Info
                    </span>

                </h1>


                <p class="mt-6 text-base sm:text-lg text-gray-600 leading-8 max-w-3xl">

                    Sudiang Info merupakan portal berita dan blog digital
                    yang menyajikan informasi terpercaya, artikel edukatif,
                    serta berita terbaru mengenai masyarakat, pendidikan,
                    teknologi, ekonomi, olahraga, dan berbagai informasi menarik lainnya.

                </p>

            </div>

        </div>

    </section>





    {{-- ABOUT --}}
    <section class="py-16 md:py-24 bg-white">

        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 md:p-12">


                <h2 class="text-center text-3xl md:text-5xl font-black text-blue-600 leading-tight mb-10 md:mb-14">

                    Menyajikan Informasi Terpercaya
                    <br class="hidden md:block">
                    Untuk Semua

                </h2>



                <div class="grid lg:grid-cols-2 gap-10 md:gap-14 items-center">


                    <div>

                        <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900"
                            class="rounded-3xl shadow-xl w-full h-72 md:h-[450px] object-cover hover:scale-105 transition duration-500"
                            alt="Sudiang Info">

                    </div>



                    <div class="space-y-5 text-gray-700 text-base md:text-lg leading-8">


                        <p>
                            <strong>Sudiang Info</strong> adalah portal berita dan media blog yang bertujuan memberikan
                            informasi cepat, akurat, dan terpercaya kepada masyarakat.
                        </p>


                        <p>
                            Kami menghadirkan informasi mengenai
                            <strong>
                                berita terkini, pendidikan, teknologi, pemerintahan, ekonomi, olahraga, budaya, dan kegiatan
                                masyarakat.
                            </strong>
                        </p>


                        <p>
                            Selain berita harian, Sudiang Info juga menyediakan artikel blog berupa tutorial, edukasi,
                            opini, dan informasi menarik untuk menambah wawasan pembaca.
                        </p>


                        <p>
                            Setiap konten melalui proses penyuntingan agar informasi yang diterima pembaca tetap berkualitas
                            dan terpercaya.
                        </p>


                    </div>


                </div>


            </div>


        </div>


    </section>





    {{-- FITUR --}}
    <section class="py-16 md:py-24 bg-gray-50">


        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">


            <div class="text-center max-w-3xl mx-auto mb-12">


                <h2 class="text-3xl md:text-4xl font-black text-gray-900">
                    Apa Yang Kami Sajikan?
                </h2>


                <p class="mt-4 text-gray-500">
                    Sudiang Info menghadirkan berita, artikel, dan informasi bermanfaat dalam satu platform.
                </p>


            </div>




            @php

                $features = [
                    [
                        'icon' => '📰',
                        'title' => 'Berita Terbaru',
                        'text' => 'Informasi nasional maupun daerah yang selalu diperbarui.',
                    ],

                    [
                        'icon' => '✍️',
                        'title' => 'Blog Edukatif',
                        'text' => 'Artikel tutorial, opini, dan informasi menarik.',
                    ],

                    [
                        'icon' => '📂',
                        'title' => 'Kategori',
                        'text' => 'Artikel tersusun berdasarkan kategori agar mudah ditemukan.',
                    ],

                    [
                        'icon' => '🌐',
                        'title' => 'Informasi Publik',
                        'text' => 'Media informasi yang bermanfaat bagi masyarakat.',
                    ],
                ];

            @endphp




            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">


                @foreach ($features as $item)
                    <div class="bg-white rounded-3xl p-7 shadow hover:shadow-xl hover:-translate-y-2 transition">


                        <div class="text-5xl mb-5">
                            {{ $item['icon'] }}
                        </div>


                        <h3 class="text-xl font-bold text-gray-900">
                            {{ $item['title'] }}
                        </h3>


                        <p class="mt-3 text-gray-600 leading-7">
                            {{ $item['text'] }}
                        </p>


                    </div>
                @endforeach


            </div>


        </div>


    </section>





    {{-- VISI MISI --}}
    <section class="py-16 md:py-24 bg-white">


        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">


            <div class="grid lg:grid-cols-2 gap-8">


                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-8 md:p-12 text-white shadow-xl">


                    <h3 class="text-3xl font-black mb-5">
                        Visi
                    </h3>


                    <p class="leading-8 text-blue-50">
                        Menjadi portal berita dan blog terpercaya yang memberikan informasi berkualitas bagi masyarakat
                        Indonesia.
                    </p>


                </div>





                <div class="bg-gray-100 rounded-3xl p-8 md:p-12">


                    <h3 class="text-3xl font-black mb-5">
                        Misi
                    </h3>


                    <ul class="space-y-4 text-gray-700">


                        <li>
                            ✔ Menyajikan berita yang akurat dan terpercaya.
                        </li>


                        <li>
                            ✔ Memberikan artikel blog yang edukatif.
                        </li>


                        <li>
                            ✔ Mendukung penyebaran informasi positif.
                        </li>


                        <li>
                            ✔ Menjadi media informasi masyarakat.
                        </li>


                    </ul>


                </div>


            </div>


        </div>


    </section>



@endsection
