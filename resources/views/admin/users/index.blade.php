@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                👥 Data Pengguna
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola pengguna dan hak akses sistem.
            </p>
        </div>


        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg hover:-translate-y-1 transition">

            ➕ Tambah Pengguna

        </a>

    </div>



    {{-- DESKTOP TABLE --}}
    <div class="hidden md:block bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4 text-left">
                            No
                        </th>

                        <th class="px-6 py-4 text-left">
                            Pengguna
                        </th>

                        <th class="px-6 py-4 text-left">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left">
                            Role
                        </th>

                        <th class="px-6 py-4 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y">


                @forelse($users as $user)


                    <tr class="hover:bg-blue-50 transition">


                        <td class="px-6 py-5 font-semibold">

                            {{ $users->firstItem() + $loop->index }}

                        </td>



                        <td class="px-6 py-5">


                            <div class="flex items-center gap-3">


                                @if($user->foto)

                                    <img src="{{ asset('storage/' . 'profile/'.$user->foto) }}" class="w-12 h-12 rounded-full object-cover border-2 border-blue-500">

                                @else

                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 text-white flex items-center justify-center font-bold text-lg">

                                        {{ strtoupper(substr($user->name,0,1)) }}

                                    </div>

                                @endif



                                <div>

                                    <p class="font-semibold text-gray-800">

                                        {{ $user->name }}

                                    </p>


                                    <p class="text-sm text-gray-400">

                                        Member

                                    </p>


                                </div>


                            </div>


                        </td>




                        <td class="px-6 py-5 text-gray-600">

                            {{ $user->email }}

                        </td>





                        <td class="px-6 py-5">


                            @if($user->role == 'admin')


                                <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                                    🛡 Admin

                                </span>


                            @else


                                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">

                                    ✍ Penulis

                                </span>


                            @endif


                        </td>






                        <td class="px-6 py-5">


                            <div class="flex justify-center gap-2">


                                <a href="{{ route('admin.users.show',$user) }}" class="w-10 h-10 rounded-xl bg-green-100 text-green-700 flex items-center justify-center hover:bg-green-600 hover:text-white transition">

                                    👁

                                </a>



                                <a href="{{ route('admin.users.edit',$user) }}" class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-700 flex items-center justify-center hover:bg-yellow-500 hover:text-white transition">

                                    ✏

                                </a>




                                <form action="{{ route('admin.users.destroy',$user) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?')">

                                    @csrf
                                    @method('DELETE')


                                    <button class="w-10 h-10 rounded-xl bg-red-100 text-red-700 flex items-center justify-center hover:bg-red-600 hover:text-white transition">

                                        🗑

                                    </button>


                                </form>


                            </div>


                        </td>


                    </tr>



                @empty


                    <tr>

                        <td colspan="5" class="text-center py-12 text-gray-400">

                            👤
                            <br>
                            Belum ada pengguna.

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>





    {{-- MOBILE CARD --}}
    <div class="md:hidden space-y-5">


        @forelse($users as $user)


        <div class="bg-white rounded-3xl shadow-lg p-5 hover:shadow-xl transition">


            <div class="flex items-center gap-4">


                @if($user->foto)


                    <img src="{{ asset('storage/' . 'profile/'.$user->foto) }}" class="w-14 h-14 rounded-full object-cover border-2 border-blue-500">


                @else


                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 text-white flex items-center justify-center font-bold text-xl">

                        {{ strtoupper(substr($user->name,0,1)) }}

                    </div>


                @endif




                <div class="flex-1">


                    <h2 class="font-bold text-gray-800">

                        {{ $user->name }}

                    </h2>


                    <p class="text-sm text-gray-500">

                        {{ $user->email }}

                    </p>


                </div>


            </div>




            <div class="mt-5">


                @if($user->role == 'admin')


                    <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm">

                        🛡 Admin

                    </span>


                @else


                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm">

                        ✍ Penulis

                    </span>


                @endif


            </div>




            <div class="grid grid-cols-3 gap-3 mt-5">


                <a href="{{ route('admin.users.show',$user) }}" class="py-3 text-center rounded-xl bg-green-100 text-green-700 hover:bg-green-600 hover:text-white transition">

                    👁

                </a>



                <a href="{{ route('admin.users.edit',$user) }}" class="py-3 text-center rounded-xl bg-yellow-100 text-yellow-700 hover:bg-yellow-500 hover:text-white transition">

                    ✏

                </a>



                <form action="{{ route('admin.users.destroy',$user) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?')">

                    @csrf
                    @method('DELETE')


                    <button class="w-full py-3 rounded-xl bg-red-100 text-red-700 hover:bg-red-600 hover:text-white transition">

                        🗑

                    </button>


                </form>


            </div>


        </div>



        @empty


        <div class="bg-white rounded-xl p-10 text-center text-gray-400">

            👤
            <br>
            Belum ada pengguna.

        </div>


        @endforelse


    </div>





    {{-- PAGINATION --}}

    <div>

        {{ $users->links() }}

    </div>



</div>


@endsection