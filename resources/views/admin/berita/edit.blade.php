@extends('layouts.admin')


@section('title', 'Edit Berita')


@section('content')


    <div class="max-w-5xl mx-auto space-y-6">


        {{-- HEADER --}}

        <div
            class="
    bg-gradient-to-r
    from-blue-600
    to-indigo-700
    rounded-3xl
    p-8
    text-white
    shadow-xl
    ">


            <h1 class="text-3xl font-bold">
                ✏️ Edit Berita
            </h1>


            <p class="text-blue-100 mt-2">
                Perbarui data berita website.
            </p>


        </div>





        {{-- FORM --}}


        <div class="
    bg-white
    rounded-3xl
    shadow-lg
    p-8
    ">



            <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">


                @csrf

                @method('PUT')



                @include('admin.berita.form')




                <div class="flex gap-3">


                    <button type="submit"
                        class="
                    px-6
                    py-3
                    rounded-xl
                    bg-blue-600
                    text-white
                    font-semibold
                    hover:bg-blue-700
                    ">

                        💾 Update Berita

                    </button>



                    <a href="{{ route('admin.berita.index') }}"
                        class="
                    px-6
                    py-3
                    rounded-xl
                    bg-gray-200
                    text-gray-700
                    font-semibold
                    hover:bg-gray-300
                    ">

                        Kembali

                    </a>



                </div>



            </form>


        </div>


    </div>



@endsection
