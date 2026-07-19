@extends('layouts.public')


@section('title', 'Kategori Berita')



@section('content')


    <section class="py-20 bg-gray-50">


        <div class="max-w-7xl mx-auto px-6">



            {{-- HEADER --}}

            <div class="text-center mb-16">


                <h1 class="text-5xl md:text-6xl font-black text-gray-900">

                    Kategori Berita

                </h1>



                <p class="mt-5 text-gray-500 text-lg">

                    Temukan informasi berdasarkan kategori favorit Anda

                </p>


            </div>







            {{-- CARD KATEGORI --}}


            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">





                @forelse($kategoris as $kategori)
                    <a href="{{ route('kategori.show', $kategori->slug) }}"
                        class="group bg-white rounded-3xl shadow-md p-8 
hover:shadow-2xl hover:-translate-y-2 transition duration-300">





                        {{-- ICON --}}

                        <div
                            class="w-20 h-20 rounded-2xl 
bg-gradient-to-br from-blue-500 to-blue-700
text-white flex items-center justify-center
text-4xl font-bold shadow-lg">


                            {{ strtoupper(substr($kategori->nama, 0, 1)) }}


                        </div>






                        <h2 class="mt-6 text-2xl font-bold text-gray-800">


                            {{ $kategori->nama }}


                        </h2>






                        <p class="mt-3 text-gray-500">


                            Berita terbaru seputar

                            {{ $kategori->nama }}


                        </p>







                        {{-- STAT --}}


                        <div class="flex gap-3 mt-6">


                            <span class="px-4 py-2 rounded-full
bg-blue-100 text-blue-700 text-sm">


                                📰

                                {{ $kategori->beritas_count }}

                                Berita


                            </span>




                            <span class="px-4 py-2 rounded-full
bg-green-100 text-green-700 text-sm">


                                📚

                                {{ $kategori->artikels_count }}

                                Artikel


                            </span>



                        </div>








                        <div class="mt-8 text-blue-600 font-bold">


                            Lihat Semua →

                        </div>





                    </a>






                @empty



                    <div class="col-span-3">

                        <div class="bg-white rounded-3xl p-12 text-center">


                            <div class="text-6xl">

                                📂

                            </div>


                            <p class="mt-4 text-gray-500">

                                Belum ada kategori

                            </p>


                        </div>

                    </div>
                @endforelse





            </div>




        </div>


    </section>



@endsection
