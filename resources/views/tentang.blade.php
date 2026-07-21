@extends('layouts.public')

@section('title', 'Tentang')

@section('content')


    {{-- HERO --}}
    <section
        class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-indigo-100 py-20 md:py-32 animate-scroll">


        {{-- Background --}}
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/30 blur-3xl rounded-full"></div>

        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-400/20 blur-3xl rounded-full"></div>



        <div class="relative max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">


            <div class="max-w-4xl">


                <span
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold text-sm shadow-sm">

                    🌐 TENTANG KAMI

                </span>




                <h1 class="mt-8 text-4xl sm:text-5xl lg:text-7xl font-black leading-tight text-gray-900">


                    Mengenal Lebih Dekat

                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">

                        Sudiang Info

                    </span>


                </h1>





                <p class="mt-8 text-lg md:text-xl text-gray-600 leading-9 max-w-3xl">


                    Portal berita digital yang menghadirkan informasi terpercaya,
                    berita terbaru, serta artikel edukatif untuk masyarakat.


                </p>
            </div>


        </div>


    </section>







    {{-- ABOUT --}}
    <section class="py-20 bg-white animate-scroll">


        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">



            <div class="grid lg:grid-cols-2 gap-12 items-center">



                <div class="relative">


                    <div class="absolute inset-0 bg-blue-600 rounded-[40px] rotate-6 opacity-20"></div>



                    <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900"
                        class="relative rounded-[40px] shadow-2xl w-full h-[350px] md:h-[500px] object-cover hover:scale-105 transition duration-500">



                </div>






                <div class="space-y-6">


                    <span class="text-blue-600 font-bold uppercase tracking-widest">

                        Sudiang Info

                    </span>



                    <h2 class="text-4xl md:text-5xl font-black text-gray-900">


                        Media Informasi Modern Untuk Semua


                    </h2>




                    <p class="text-gray-600 text-lg leading-8">


                        Sudiang Info merupakan portal berita dan blog digital
                        yang menyediakan informasi cepat, akurat dan terpercaya.


                    </p>




                    <p class="text-gray-600 text-lg leading-8">


                        Kami menghadirkan berita mengenai pendidikan,
                        teknologi, ekonomi, olahraga, budaya, dan informasi masyarakat.


                    </p>

                </div>
                
            </div>


        </div>



        </div>


        </div>


    </section>








    {{-- FITUR --}}

    <section class="py-20 bg-gray-50 animate-scroll">


        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">


            <div class="text-center mb-14">


                <h2 class="text-4xl md:text-5xl font-black">

                    Apa Yang Kami Sajikan?

                </h2>



                <p class="mt-4 text-gray-500">

                    Platform berita dengan berbagai fitur informasi.

                </p>


            </div>





            @php

                $features = [
                    [
                        'icon' => '📰',
                        'title' => 'Berita Terbaru',
                        'text' => 'Informasi terbaru yang selalu diperbarui.',
                    ],

                    [
                        'icon' => '✍️',
                        'title' => 'Artikel Edukatif',
                        'text' => 'Konten inspiratif dan menambah wawasan.',
                    ],

                    [
                        'icon' => '📂',
                        'title' => 'Kategori',
                        'text' => 'Informasi tersusun rapi berdasarkan kategori.',
                    ],

                    [
                        'icon' => '🌎',
                        'title' => 'Informasi Publik',
                        'text' => 'Media informasi untuk masyarakat.',
                    ],
                ];

            @endphp






            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">



                @foreach ($features as $item)
                    <div
                        class="bg-white rounded-3xl p-8 shadow hover:shadow-2xl hover:-translate-y-3 transition duration-300">


                        <div class="text-5xl mb-6">

                            {{ $item['icon'] }}

                        </div>



                        <h3 class="text-xl font-bold">

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

    <section id="visi" class="py-20 bg-white animate-scroll">


        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">


            <div class="grid lg:grid-cols-2 gap-8">



                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[35px] p-10 md:p-14 text-white shadow-xl">


                    <h3 class="text-4xl font-black mb-6">

                        Visi

                    </h3>



                    <p class="text-blue-100 text-lg leading-8">

                        Menjadi portal berita terpercaya yang memberikan informasi berkualitas dan bermanfaat bagi
                        masyarakat.

                    </p>


                </div>





                <div class="bg-gray-100 rounded-[35px] p-10 md:p-14">


                    <h3 class="text-4xl font-black mb-6">

                        Misi

                    </h3>



                    <ul class="space-y-4 text-gray-700 text-lg">


                        <li>
                            ✔ Menyajikan berita akurat dan terpercaya.
                        </li>


                        <li>
                            ✔ Memberikan artikel edukatif.
                        </li>


                        <li>
                            ✔ Menyebarkan informasi positif.
                        </li>


                        <li>
                            ✔ Menjadi media informasi masyarakat.
                        </li>


                    </ul>


                </div>



            </div>


        </div>


    </section>








    {{-- SCRIPT ANIMASI SCROLL --}}

    <script>
        document.addEventListener("DOMContentLoaded", () => {


            const items = document.querySelectorAll(".animate-scroll");


            const observer = new IntersectionObserver((entries) => {


                entries.forEach(entry => {


                    if (entry.isIntersecting) {


                        entry.target.classList.remove(
                            "opacity-0",
                            "translate-y-10"
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




            items.forEach(item => {


                item.classList.add(
                    "opacity-0",
                    "translate-y-10",
                    "transition-all",
                    "duration-700",
                    "ease-out"
                );



                observer.observe(item);


            });


        });
    </script>



@endsection
