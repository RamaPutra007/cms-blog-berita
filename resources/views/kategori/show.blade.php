@extends('layouts.public')


@section('title', $kategori->nama)



@section('content')



    <section class="py-20 bg-gray-50">


        <div class="max-w-7xl mx-auto px-6">





            {{-- HEADER --}}


            <div class="mb-12">


                <p class="text-blue-600 font-semibold">

                    Kategori

                </p>



                <h1 class="text-5xl font-black">


                    {{ $kategori->nama }}

                </h1>



                <p class="text-gray-500 mt-4">


                    Berita dan artikel terbaru kategori
                    {{ $kategori->nama }}


                </p>


            </div>








            {{-- BERITA --}}



            <div class="flex justify-between items-center mb-8">


                <h2 class="text-3xl font-bold">

                    📰 Berita Terbaru

                </h2>


            </div>





            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">



                @forelse($beritas as $berita)
                    <div class="bg-white rounded-3xl shadow hover:shadow-xl transition overflow-hidden">





                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-56 object-cover">
                        @else
                            <div class="h-56 bg-gray-200 flex items-center justify-center">

                                No Image

                            </div>
                        @endif





                        <div class="p-6">



                            <span class="px-3 py-1 rounded-full
bg-blue-100 text-blue-700 text-sm">


                                {{ $kategori->nama }}


                            </span>





                            <h3 class="mt-5 text-xl font-bold">


                                {{ $berita->judul }}


                            </h3>





                            <p class="mt-3 text-gray-500">


                                {{ Str::limit($berita->isi, 120) }}


                            </p>





                            <a href="{{ route('berita.show', $berita->slug) }}"
                                class="inline-block mt-5 text-blue-600 font-semibold">


                                Baca Selengkapnya →

                            </a>



                        </div>



                    </div>




                @empty


                    <p class="text-gray-400">

                        Belum ada berita

                    </p>
                @endforelse



            </div>





            <div class="mt-8">

                {{ $beritas->links() }}

            </div>









            {{-- ARTIKEL --}}



            <div class="mt-20">


                <h2 class="text-3xl font-bold mb-8">

                    📚 Artikel Blog

                </h2>



                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">





                    @forelse($artikels as $artikel)
                        <div class="bg-white rounded-3xl shadow p-6">





                            @if ($artikel->gambar)
                                <img src="{{ asset('storage/' . $artikel->gambar) }}"
                                    class="rounded-2xl w-full h-52 object-cover">
                            @endif






                            <h3 class="mt-5 text-xl font-bold">


                                {{ $artikel->judul }}


                            </h3>






                            <p class="mt-3 text-gray-500">


                                {{ Str::limit($artikel->isi, 120) }}


                            </p>






                            <a href="{{ route('blog.show', $artikel->slug) }}"
                                class="mt-5 inline-block text-blue-600 font-semibold">


                                Baca Artikel →

                            </a>




                        </div>



                    @empty


                        <p class="text-gray-400">

                            Belum ada artikel

                        </p>
                    @endforelse



                </div>



                <div class="mt-8">

                    {{ $artikels->links() }}

                </div>


            </div>






        </div>


    </section>



@endsection
