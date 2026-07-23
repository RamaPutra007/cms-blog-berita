@extends('layouts.public')

@section('title', 'Beranda')


@section('content')


    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-20 animate-scroll">


        {{-- BACKGROUND EFFECT --}}
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-blue-400/30 blur-3xl rounded-full pointer-events-none"></div>

        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-400/20 blur-3xl rounded-full pointer-events-none"></div>



        <div class="relative max-w-7xl mx-auto px-5 sm:px-6">


            <div class="grid lg:grid-cols-2 gap-14 items-center">



                {{-- TEXT --}}
                <div>


                    <span class="inline-block px-5 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold text-sm">

                        🌐 Portal Berita Terpercaya

                    </span>



                    <h1 class="mt-6 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-gray-900">


                        Informasi

                        <span class="text-blue-600">

                            Terbaru

                        </span>


                        Dalam Genggaman Anda



                    </h1>




                    <p class="mt-6 text-lg text-gray-600 leading-relaxed">


                        Sudiang Info menghadirkan berita dan artikel terbaru,
                        cepat, akurat dan terpercaya dari berbagai kategori.



                    </p>





                    <div class="mt-8 flex flex-wrap gap-4">


                        <a href="#berita"
                            class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold shadow-lg hover:-translate-y-1 transition duration-300">


                            📰 Baca Berita


                        </a>




                        <a href="{{ route('tentang') }}"
                            class="px-8 py-4 bg-white border border-gray-300 rounded-xl font-semibold hover:bg-gray-100 transition duration-300">


                            Tentang Kami


                        </a>



                    </div>






                    {{-- STATISTIK --}}

                    <div class="grid grid-cols-3 gap-5 mt-12">



                        <div>

                            <h2 class="text-3xl sm:text-4xl font-black">

                                {{ $berita->count() }}

                            </h2>


                            <p class="text-gray-500 text-sm">

                                Berita

                            </p>


                        </div>





                        <div>

                            <h2 class="text-3xl sm:text-4xl font-black">

                                {{ $artikel->count() }}

                            </h2>


                            <p class="text-gray-500 text-sm">

                                Artikel

                            </p>


                        </div>





                        <div>

                            <h2 class="text-3xl sm:text-4xl font-black">

                                {{ $kategori->count() }}

                            </h2>


                            <p class="text-gray-500 text-sm">

                                Kategori

                            </p>


                        </div>



                    </div>




                </div>









                {{-- IMAGE --}}

                <div class="relative">
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[40px] p-5 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e"
                            class="rounded-[30px] w-full h-[420px] object-cover">
                    </div>
                </div>

            </div>

        </div>

    </section>









    {{-- KATEGORI --}}

    <section class="py-20 bg-white animate-scroll">


        <div class="max-w-7xl mx-auto px-5 sm:px-6">


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
                        class="relative z-10 bg-gray-50 rounded-2xl p-8 text-center shadow hover:shadow-xl hover:-translate-y-2 transition duration-300">


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









    {{-- BERITA --}}

    <section id="berita" class="py-20 bg-gray-100 animate-scroll">


        <div class="max-w-7xl mx-auto px-5 sm:px-6">


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
                    <div
                        class="relative z-10 bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition duration-300">



                        @if ($item->gambar)
                            <img src="{{ Storage::url($item->gambar) }}" class="w-full h-56 object-cover">
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
                                class="relative z-20 inline-block mt-5 text-blue-600 font-semibold hover:text-blue-800">

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









    {{-- ARTIKEL --}}

    <section class="py-20 bg-white animate-scroll">


        <div class="max-w-7xl mx-auto px-5 sm:px-6">


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
                    <div class="relative z-10 bg-gray-50 rounded-3xl shadow p-6 hover:shadow-xl transition duration-300">


                        @if ($item->gambar)
                            <img src="{{ Storage::url($item->gambar) }}"
                                class="w-full h-52 object-cover rounded-2xl">
                        @endif



                        <h3 class="text-xl font-bold mt-5">

                            {{ $item->judul }}

                        </h3>



                        <p class="text-gray-500 mt-3">

                            {{ Str::limit($item->isi, 100) }}

                        </p>



                        <a href="{{ route('blog.show', $item->slug) }}"
                            class="relative z-20 inline-block mt-5 text-blue-600 font-semibold hover:text-blue-800">

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

    <section class="py-20 bg-blue-700 text-white animate-scroll">


        <div class="max-w-5xl mx-auto px-6 text-center">


            <h2 class="text-5xl font-bold">

                Selalu Update Bersama Sudiang Info

            </h2>


            <p class="mt-6 text-blue-100 text-lg">

                Informasi terbaru dari berbagai kategori terpercaya.

            </p>


        </div>


    </section>









    {{-- SCROLL ANIMATION --}}

    <script>
        document.addEventListener("DOMContentLoaded", () => {


            const elements = document.querySelectorAll(".animate-scroll");


            const observer = new IntersectionObserver((entries) => {


                entries.forEach(entry => {


                    if (entry.isIntersecting) {


                        entry.target.classList.remove(
                            "opacity-0",
                            "translate-y-8"
                        );


                        entry.target.classList.add(
                            "opacity-100",
                            "translate-y-0"
                        );


                        observer.unobserve(entry.target);


                    }


                });


            }, {
                threshold: 0.15
            });



            elements.forEach(el => {


                el.classList.add(
                    "opacity-0",
                    "translate-y-8",
                    "transition-all",
                    "duration-500",
                    "ease-out"
                );



                observer.observe(el);


            });


        });
    </script>



@endsection
