@extends('layouts.public')


@section('title', 'Berita')



@section('content')


    <section class="py-20 bg-gray-50">


        <div class="max-w-7xl mx-auto px-6">



            <div class="text-center mb-14">


                <h1 class="text-5xl font-black">

                    Berita Terbaru

                </h1>


                <p class="mt-3 text-gray-500">

                    Informasi terkini dan terpercaya

                </p>


            </div>





            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">



                @forelse($beritas as $berita)
                    <div class="
bg-white
rounded-3xl
shadow
overflow-hidden
hover:shadow-xl
transition
">





                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-56 object-cover">
                        @else
                            <div class="h-56 bg-gray-200 flex items-center justify-center">

                                No Image

                            </div>
                        @endif





                        <div class="p-6">





                            <span class="
px-3 py-1
rounded-full
bg-blue-100
text-blue-700
text-sm">


                                {{ $berita->kategori->nama ?? '-' }}


                            </span>






                            <h2 class="mt-5 text-xl font-bold">


                                {{ $berita->judul }}


                            </h2>





                            <div class="mt-3 text-sm text-gray-400">


                                👤 {{ $berita->user->name ?? '-' }}


                                <br>


                                {{ $berita->created_at->format('d M Y') }}


                            </div>






                            <p class="mt-4 text-gray-500">


                                {{ Str::limit($berita->isi, 120) }}


                            </p>






                            <a href="{{ route('berita.show', $berita->slug) }}"
                                class="inline-block mt-5 text-blue-600 font-semibold">


                                Baca Selengkapnya →


                            </a>





                        </div>



                    </div>



                @empty


                    <div class="col-span-3 text-center text-gray-400">

                        📢

                        <p>

                            Belum ada berita publish

                        </p>


                    </div>
                @endforelse



            </div>





            <div class="mt-10">


                {{ $beritas->links() }}


            </div>



        </div>


    </section>


@endsection
