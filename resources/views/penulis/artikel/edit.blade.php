@extends('layouts.penulis')

@section('title', 'Edit Artikel')


@section('content')


    <div class="max-w-4xl mx-auto">


        <div class="bg-white rounded-2xl shadow p-8">


            <h1 class="text-2xl font-bold mb-6">
                Edit Artikel
            </h1>



            <form action="{{ route('penulis.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">


                @csrf

                @method('PUT')


                @include('penulis.artikel.form')


                <button class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl">

                    Update

                </button>


            </form>


        </div>


    </div>


@endsection
