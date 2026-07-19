@extends('layouts.penulis')


@section('title', 'Tambah Berita')


@section('content')


    <div class="max-w-4xl mx-auto">


        <div class="bg-white rounded-3xl shadow-xl p-8">


            <h1 class="text-3xl font-bold mb-6">
                Tambah Berita
            </h1>



            <form action="{{ route('penulis.berita.store') }}" method="POST" enctype="multipart/form-data">


                @csrf


                @include('penulis.berita.form')



                <button class="
mt-8
px-8
py-3
rounded-xl
bg-blue-600
text-white
">


                    Simpan


                </button>



            </form>


        </div>


    </div>


@endsection
