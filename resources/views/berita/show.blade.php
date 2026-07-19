@extends('layouts.public')


@section('title', $berita->judul)



@section('content')


    <section class="py-20 bg-white">


        <div class="max-w-5xl mx-auto px-6">





            <h1 class="text-5xl font-black text-gray-900">


                {{ $berita->judul }}


            </h1>






            <div class="mt-5 text-gray-500">


                👤 {{ $berita->user->name ?? '-' }}


                |

                {{ $berita->created_at->format('d M Y') }}


            </div>







            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="mt-10 w-full h-[450px] object-cover rounded-3xl">
            @endif







            <div class="mt-10 text-gray-700 leading-8 text-lg">


                {!! nl2br(e($berita->isi)) !!}


            </div>







            <div class="mt-10">


                <a href="{{ route('kategori.show', $berita->kategori->slug) }}"
                    class="
px-4 py-2
rounded-full
bg-blue-100
text-blue-700
">


                    {{ $berita->kategori->nama }}


                </a>


            </div>




        </div>


    </section>


@endsection
