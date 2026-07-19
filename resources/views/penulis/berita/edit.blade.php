@extends('layouts.penulis')


@section('title', 'Edit Berita')


@section('content')


    <div class="max-w-4xl mx-auto">


        <div class="bg-white rounded-3xl shadow-xl p-8">


            <h1 class="text-3xl font-bold mb-6">
                Edit Berita
            </h1>



            <form action="{{ route('penulis.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">


                @csrf

                @method('PUT')


                @include('penulis.berita.form')



                <button class="
mt-8
px-8
py-3
bg-blue-600
text-white
rounded-xl
">


                    Update


                </button>


            </form>



        </div>


    </div>


@endsection
