@extends('layouts.penulis')

@section('title', 'Profil Saya')

@section('content')

    <div class="max-w-6xl mx-auto space-y-6">

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-xl">
                {{ session('success') }}
            </div>
        @endif


        {{-- HEADER --}}

        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-xl">

            <h1 class="text-3xl font-bold">
                Profil Saya
            </h1>

            <p class="mt-2 text-blue-100">
                Kelola informasi akun
            </p>

        </div>



        {{-- FORM --}}

        <div class="bg-white rounded-3xl shadow-xl p-8">


            <form action="{{ route('penulis.profile.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="flex flex-col md:flex-row gap-10 items-center">


                    {{-- FOTO --}}

                    <div class="text-center">


                        <img id="previewFoto"
                            src="{{ auth()->user()->foto ? asset('storage/profile/' . auth()->user()->foto) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name }}"
                            class="w-36 h-36 rounded-full object-cover shadow-xl border-4 border-white">


                        <label
                            class="block mt-5 cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl transition">


                            📷 Pilih Foto


                            <input type="file" name="foto" id="foto" accept="image/*" class="hidden">


                        </label>


                    </div>





                    {{-- DATA USER --}}


                    <div class="flex-1 w-full">


                        <label class="font-semibold text-gray-700">
                            Nama
                        </label>


                        <input type="text" name="name" value="{{ auth()->user()->name }}"
                            class="w-full mt-2 border rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500">






                        <label class="block mt-5 font-semibold text-gray-700">
                            Email
                        </label>


                        <input type="email" name="email" value="{{ auth()->user()->email }}"
                            class="w-full mt-2 border rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500">







                        <label class="block mt-5 font-semibold text-gray-700">
                            Password Baru
                        </label>


                        <div class="relative">

                            <input id="password" type="password" name="password" placeholder="Kosongkan jika tidak diganti"
                                class="w-full mt-2 border rounded-xl p-3 pr-12 focus:ring-blue-500 focus:border-blue-500">


                            <button type="button" onclick="togglePassword()"
                                class="absolute right-4 top-5 text-gray-500 hover:text-blue-600">

                                👁

                            </button>

                        </div>






                        <button
                            class="mt-6 px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg transition">

                            💾 Simpan

                        </button>


                    </div>


                </div>


            </form>


        </div>


    </div>





    {{-- SCRIPT PREVIEW FOTO --}}

    <script>
        document.getElementById('foto').addEventListener('change', function(event) {

            const file = event.target.files[0];

            if (file) {

                const reader = new FileReader();

                reader.onload = function(e) {

                    document.getElementById('previewFoto').src = e.target.result;

                }

                reader.readAsDataURL(file);

            }

        });





        {{-- SHOW HIDE PASSWORD --}}

        function togglePassword() {

            const password = document.getElementById('password');

            if (password.type === "password") {

                password.type = "text";

            } else {

                password.type = "password";

            }

        }
    </script>


@endsection
