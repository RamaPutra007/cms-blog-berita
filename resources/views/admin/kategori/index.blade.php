@extends('layouts.admin')

@section('title','Data Kategori')


@section('content')


<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">


    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Data Kategori
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola kategori artikel dan berita website.
        </p>

    </div>



    {{-- Button tambah --}}
    <a href="{{ route('admin.kategori.create') }}"
        class="inline-flex items-center justify-center gap-2
        bg-blue-600 hover:bg-blue-700
        text-white px-5 py-3
        rounded-xl
        shadow-md hover:shadow-xl
        hover:-translate-y-1
        transition-all duration-300">


        📂 Tambah Kategori


    </a>


</div>




@if(session('success'))

<div class="mb-6 flex items-center gap-3
bg-green-100 border border-green-300
text-green-700
px-5 py-4
rounded-xl shadow-sm">


    ✅

    <span>
        {{ session('success') }}
    </span>


</div>

@endif







<div class="bg-white rounded-3xl shadow-xl overflow-hidden">



    {{-- responsive table --}}
    <div class="overflow-x-auto">



        <table class="min-w-full text-left">



            <thead class="bg-gray-100">


                <tr>


                    <th class="px-6 py-4 text-gray-700 font-semibold">
                        No
                    </th>


                    <th class="px-6 py-4 text-gray-700 font-semibold">
                        Nama Kategori
                    </th>


                    <th class="px-6 py-4 text-center text-gray-700 font-semibold">
                        Jumlah Artikel
                    </th>


                    <th class="px-6 py-4 text-center text-gray-700 font-semibold">
                        Aksi
                    </th>


                </tr>


            </thead>





            <tbody class="divide-y">



            @forelse($kategoris as $kategori)



                <tr
                class="
                hover:bg-blue-50
                transition-all duration-300
                group">



                    {{-- Nomor --}}
                    <td class="px-6 py-5">

                        <span
                        class="font-semibold text-gray-700">

                            {{ $kategoris->firstItem() + $loop->index }}

                        </span>

                    </td>





                    {{-- Nama --}}
                    <td class="px-6 py-5">


                        <div class="flex items-center gap-4">


                            <div
                            class="
                            w-12 h-12
                            rounded-full
                            bg-gradient-to-r
                            from-blue-500
                            to-blue-700
                            text-white
                            flex items-center justify-center
                            font-bold text-lg
                            shadow-md">


                                {{ strtoupper(substr($kategori->nama,0,1)) }}


                            </div>




                            <div>


                                <p class="font-semibold text-gray-800">


                                    {{ $kategori->nama }}


                                </p>


                                <p class="text-sm text-gray-400">


                                    Kategori Berita


                                </p>


                            </div>


                        </div>


                    </td>







                    {{-- jumlah --}}
                    <td class="px-6 py-5 text-center">


                        <span
                        class="
                        inline-flex
                        items-center
                        justify-center
                        w-12 h-12
                        rounded-full
                        bg-blue-100
                        text-blue-700
                        font-bold
                        shadow-sm
                        group-hover:scale-110
                        transition">


                            {{ $kategori->artikels_count ?? 0 }}


                        </span>


                    </td>







                    {{-- aksi --}}
                    <td class="px-6 py-5">


                        <div
                        class="
                        flex
                        justify-center
                        gap-2
                        flex-wrap">





                            {{-- detail --}}
                            <a
                            href="{{ route('admin.kategori.show',$kategori) }}"
                            class="
                            w-10 h-10
                            flex items-center justify-center
                            rounded-xl
                            bg-green-100
                            text-green-700
                            hover:bg-green-600
                            hover:text-white
                            hover:scale-110
                            transition"
                            title="Detail">


                                👁


                            </a>








                            {{-- edit --}}
                            <a
                            href="{{ route('admin.kategori.edit',$kategori) }}"
                            class="
                            w-10 h-10
                            flex items-center justify-center
                            rounded-xl
                            bg-yellow-100
                            text-yellow-700
                            hover:bg-yellow-500
                            hover:text-white
                            hover:scale-110
                            transition"
                            title="Edit">


                                ✏


                            </a>









                            {{-- hapus --}}
                            <form
                            action="{{ route('admin.kategori.destroy',$kategori) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">


                                @csrf

                                @method('DELETE')



                                <button
                                class="
                                w-10 h-10
                                flex items-center justify-center
                                rounded-xl
                                bg-red-100
                                text-red-700
                                hover:bg-red-600
                                hover:text-white
                                hover:scale-110
                                transition"
                                title="Hapus">


                                    🗑


                                </button>


                            </form>






                        </div>


                    </td>





                </tr>




            @empty



                <tr>


                    <td colspan="4"
                    class="
                    text-center
                    py-14
                    text-gray-400">


                        <div class="text-5xl mb-3">
                            📂
                        </div>


                        <p class="font-medium">
                            Belum ada data kategori
                        </p>


                    </td>


                </tr>



            @endforelse




            </tbody>



        </table>



    </div>



</div>







{{-- Pagination --}}

<div class="mt-6">

    {{ $kategoris->links() }}

</div>





@endsection