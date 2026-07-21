@extends('layouts.penulis')


@section('title', 'Tambah Artikel')


@section('content')


    <div class="max-w-4xl mx-auto">


        <div class="bg-white rounded-3xl shadow-lg p-6 md:p-10">


            <div class="flex justify-between items-center mb-8">


                <h1 class="text-3xl font-bold">
                    Tambah Artikel
                </h1>


                <a href="{{ route('admin.artikel.index') }}" class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

                    ← Kembali

                </a>


            </div>





            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('penulis.artikel.form')
                <button class="mt-8 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">


                    Simpan Artikel


                </button>



            </form>


        </div>


    </div>


@endsection
