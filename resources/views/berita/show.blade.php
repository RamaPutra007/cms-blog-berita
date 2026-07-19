@extends('layouts.public')


@section('title', $berita->judul)



@section('content')


    <section class="bg-gray-50 py-12 md:py-20">


        <div class="max-w-5xl mx-auto px-4 sm:px-6">






            {{-- CARD BERITA --}}


            <article class="
bg-white
rounded-3xl
shadow-xl
overflow-hidden
">







                {{-- GAMBAR BERITA --}}


                @if ($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                        class="
w-full
h-64
sm:h-80
md:h-[450px]
object-cover
">
                @else
                    <div class="
h-64
bg-gray-200
flex
items-center
justify-center
text-gray-400
">


                        Tidak ada gambar


                    </div>
                @endif










                <div class="
p-6
md:p-12
">







                    {{-- KATEGORI --}}


                    @if ($berita->kategori)
                        <a href="{{ route('kategori.show', $berita->kategori->slug) }}"
                            class="
inline-flex
items-center
px-4
py-2
rounded-full
bg-blue-100
text-blue-700
font-semibold
text-sm
hover:bg-blue-200
transition
">


                            {{ $berita->kategori->nama }}


                        </a>
                    @endif







                    {{-- JUDUL --}}



                    <h1 class="
mt-6
text-3xl
sm:text-4xl
md:text-5xl
font-black
leading-tight
text-gray-900
">


                        {{ $berita->judul }}


                    </h1>










                    {{-- INFO PENULIS --}}


                    <div class="
mt-8
flex
flex-wrap
items-center
gap-4
">





                        <div
                            class="
w-12
h-12
rounded-full
bg-blue-600
text-white
flex
items-center
justify-center
font-bold
text-lg
">


                            {{ strtoupper(substr($berita->user->name ?? 'U', 0, 1)) }}


                        </div>






                        <div>


                            <p class="
font-semibold
text-gray-800
">


                                {{ $berita->user->name ?? 'Penulis' }}


                            </p>



                            <p class="
text-sm
text-gray-500
">


                                Penulis Berita


                            </p>


                        </div>







                        <span class="text-gray-400">

                            •

                        </span>





                        <p class="
text-sm
text-gray-500
">


                            {{ $berita->created_at->format('d M Y') }}


                        </p>





                    </div>













                    {{-- ISI BERITA --}}



                    <div class="
mt-10
prose
prose-lg
max-w-none
text-gray-700
leading-8
">


                        {!! nl2br(e($berita->isi)) !!}


                    </div>








                </div>



            </article>









            {{-- TOMBOL KEMBALI --}}


            <div class="mt-10">


                <a href="{{ route('berita.index') }}"
                    class="
inline-flex
items-center
px-6
py-3
bg-gray-900
text-white
rounded-xl
hover:bg-gray-700
transition
shadow
">


                    ← Kembali ke Berita


                </a>


            </div>







        </div>



    </section>



@endsection
