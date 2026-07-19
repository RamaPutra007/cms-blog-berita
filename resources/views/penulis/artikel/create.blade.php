@extends('layouts.penulis')

@section('title', 'Tambah Artikel')


@section('content')


    <div class="max-w-5xl mx-auto">


        <div class="bg-white rounded-3xl shadow-xl p-8">


            {{-- HEADER --}}
            <div class="mb-8">

                <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Tambah Artikel
                </h1>

                <p class="text-gray-500 mt-2">
                    Buat artikel baru untuk website Sudiang Info
                </p>

            </div>





            <form action="{{ route('penulis.artikel.store') }}" method="POST" enctype="multipart/form-data">


                @csrf



                @include('penulis.artikel.form')





                {{-- BUTTON --}}

                <div class="flex flex-col sm:flex-row gap-4 mt-8">


                    <button
                        class="
                    px-8 py-3
                    rounded-xl
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    font-semibold
                    shadow-lg
                    transition
                    ">


                        💾 Simpan Artikel


                    </button>





                    <a href="{{ route('penulis.artikel.index') }}"
                        class="
                    px-8 py-3
                    rounded-xl
                    bg-gray-100
                    hover:bg-gray-200
                    text-gray-700
                    font-semibold
                    text-center
                    transition
                    ">


                        ← Kembali


                    </a>



                </div>



            </form>



        </div>



    </div>



@endsection
