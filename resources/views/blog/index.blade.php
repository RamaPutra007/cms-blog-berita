@extends('layouts.public')


@section('title', 'Blog')



@section('content')



    <section class="py-20 bg-gray-50">


        <div class="max-w-7xl mx-auto px-6">





            {{-- HEADER --}}


            <div class="text-center mb-14">


                <h1 class="text-5xl font-black text-gray-900">

                    Artikel Terbaru

                </h1>


                <p class="mt-4 text-gray-500 text-lg">

                    Informasi menarik dari penulis Sudiang Info

                </p>


            </div>







            {{-- LIST ARTIKEL --}}


            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">





                @forelse($artikels as $artikel)
                    <div class="bg-white rounded-3xl shadow-md
overflow-hidden hover:shadow-xl transition">





                        @if ($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="w-full h-56 object-cover">
                        @else
                            <div class="h-56 bg-gray-200 flex items-center justify-center">

                                No Image

                            </div>
                        @endif







                        <div class="p-6">





                            <span class="px-3 py-1 rounded-full
bg-blue-100 text-blue-700 text-sm">


                                {{ $artikel->kategori->nama ?? '-' }}


                            </span>






                            <h2 class="mt-5 text-xl font-bold text-gray-800">


                                {{ $artikel->judul }}


                            </h2>






                            <div class="text-sm text-gray-400 mt-2">


                                ✍ {{ $artikel->user->name ?? '-' }}

                                <br>

                                {{ $artikel->created_at->format('d M Y') }}


                            </div>






                            <p class="mt-4 text-gray-500">


                                {{ Str::limit($artikel->isi, 120) }}


                            </p>






                            <a href="{{ route('blog.show', $artikel->slug) }}"
                                class="inline-block mt-5 text-blue-600 font-semibold">


                                Baca Selengkapnya →


                            </a>






                        </div>




                    </div>





                @empty



                    <div class="col-span-3 text-center text-gray-400">


                        📚

                        <p>

                            Belum ada artikel publish

                        </p>


                    </div>
                @endforelse





            </div>






            <div class="mt-10">

                {{ $artikels->links() }}

            </div>





        </div>


    </section>



@endsection
