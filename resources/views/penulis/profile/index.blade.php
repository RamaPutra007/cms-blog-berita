@extends('layouts.penulis')


@section('title', 'Profil Saya')



@section('content')


    <div class="max-w-6xl mx-auto space-y-6">



        @if (session('success'))
            <div class="
bg-green-100
border
border-green-300
text-green-700
p-4
rounded-xl">

                {{ session('success') }}

            </div>
        @endif





        <div class="
bg-gradient-to-r
from-blue-600
to-indigo-700
rounded-3xl
p-8
text-white
shadow-xl">


            <h1 class="text-3xl font-bold">

                Profil Saya

            </h1>


            <p class="mt-2">

                Kelola informasi akun

            </p>


        </div>









        <div class="
bg-white
rounded-3xl
shadow-xl
p-8">



            <form action="{{ route('penulis.profile.update') }}" method="POST" enctype="multipart/form-data">


                @csrf

                @method('PUT')





                <div class="
flex
flex-col
md:flex-row
gap-10
items-center">








                    {{-- FOTO --}}


                    <div class="text-center">



                        @if (auth()->user()->foto)
                            <img src="{{ asset('storage/profile/' . auth()->user()->foto) }}"
                                class="
w-36
h-36
rounded-full
object-cover
shadow-xl
border-4">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                class="
w-36
h-36
rounded-full
shadow-xl
border-4">
                        @endif







                        <label class="
block
mt-5
cursor-pointer
bg-blue-600
text-white
px-5
py-3
rounded-xl">


                            📷 Pilih Foto



                            <input type="file" name="foto" class="hidden">


                        </label>




                    </div>










                    {{-- DATA --}}


                    <div class="flex-1 w-full">



                        <label>

                            Nama

                        </label>


                        <input name="name" value="{{ auth()->user()->name }}" class="
w-full
mt-2
border
rounded-xl
p-3">







                        <label class="block mt-5">

                            Email

                        </label>


                        <input name="email" value="{{ auth()->user()->email }}"
                            class="
w-full
mt-2
border
rounded-xl
p-3">







                        <label class="block mt-5">

                            Password Baru

                        </label>


                        <input type="password" name="password" placeholder="Kosongkan jika tidak diganti"
                            class="
w-full
mt-2
border
rounded-xl
p-3">








                        <button class="
mt-6
px-8
py-3
bg-blue-600
text-white
rounded-xl
shadow">


                            💾 Simpan


                        </button>



                    </div>







                </div>


            </form>


        </div>






    </div>


@endsection
