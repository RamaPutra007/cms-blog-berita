@extends('layouts.admin')


@section('title', 'Tambah Berita')


@section('content')


    <div class="max-w-5xl mx-auto space-y-6">



        {{-- HEADER --}}

        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-xl">


            <h1 class="text-3xl md:text-4xl font-black">

                📰 Tambah Berita

            </h1>


            <p class="mt-2 text-blue-100">

                Tambahkan berita baru ke website.

            </p>


        </div>








        {{-- FORM CARD --}}

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-8">





            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">



                @csrf





                @include('admin.berita.form')







                {{-- BUTTON --}}

                <div class="flex flex-col sm:flex-row gap-4 pt-6">





                    <button type="submit"
                        class="flex-1 px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300">


                        💾 Simpan Berita


                    </button>








                    <a href="{{ route('admin.berita.index') }}"
                        class="flex-1 text-center px-8 py-3 rounded-xl bg-gray-700 text-white font-bold shadow-lg hover:bg-gray-800 hover:-translate-y-1 transition duration-300">


                        ← Kembali


                    </a>





                </div>





            </form>





        </div>





    </div>



@endsection
