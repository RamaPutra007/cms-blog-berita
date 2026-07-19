@extends('layouts.admin')

@section('title', 'Data Kategori')

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Data Kategori
                </h1>

                <p class="text-gray-500 mt-1">
                    Kelola kategori artikel website.
                </p>
            </div>


            <a href="{{ route('admin.kategori.create') }}"
                class="px-5 py-3 bg-blue-600 text-white rounded-xl shadow-lg
            hover:bg-blue-700 transition">

                + Tambah Kategori

            </a>

        </div>

        {{-- Desktop Table --}}
        <div class="hidden md:block bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="px-6 py-5 text-left">
                                No
                            </th>

                            <th class="px-6 py-5 text-left">
                                Kategori
                            </th>

                            <th class="px-6 py-5 text-center">
                                Jumlah Artikel
                            </th>

                            <th class="px-6 py-5 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y">


                        @forelse($kategoris as $kategori)
                            <tr class="hover:bg-blue-50 transition">


                                <td class="px-6 py-5 font-semibold">

                                    {{ $kategoris->firstItem() + $loop->index }}

                                </td>


                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">


                                        <div
                                            class="w-12 h-12 rounded-full
                                bg-blue-600 text-white
                                flex items-center justify-center
                                font-bold text-xl shadow">

                                            {{ strtoupper(substr($kategori->nama, 0, 1)) }}

                                        </div>


                                        <div>

                                            <p class="font-bold text-gray-800">
                                                {{ $kategori->nama }}
                                            </p>

                                            <p class="text-sm text-gray-400">
                                                Kategori Website
                                            </p>

                                        </div>


                                    </div>

                                </td>



                                <td class="px-6 py-5 text-center">

                                    <span
                                        class="inline-flex items-center justify-center
                            w-12 h-12 rounded-full
                            bg-blue-100 text-blue-700 font-bold">

                                        {{ $kategori->artikels_count }}

                                    </span>

                                </td>



                                <td class="px-6 py-5">

                                    <div class="flex justify-center gap-2">


                                        <a href="{{ route('admin.kategori.show', $kategori) }}"
                                            class="w-10 h-10 rounded-xl bg-green-100
                                    text-green-700 flex items-center justify-center
                                    hover:bg-green-600 hover:text-white transition">

                                            👁

                                        </a>


                                        <a href="{{ route('admin.kategori.edit', $kategori) }}"
                                            class="w-10 h-10 rounded-xl bg-yellow-100
                                    text-yellow-700 flex items-center justify-center
                                    hover:bg-yellow-500 hover:text-white transition">

                                            ✏

                                        </a>



                                        <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST"
                                            onsubmit="return confirm('Hapus kategori ini?')">

                                            @csrf
                                            @method('DELETE')


                                            <button
                                                class="w-10 h-10 rounded-xl bg-red-100
                                        text-red-700 flex items-center justify-center
                                        hover:bg-red-600 hover:text-white transition">

                                                🗑

                                            </button>


                                        </form>


                                    </div>

                                </td>


                            </tr>


                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-10 text-gray-400">

                                    Belum ada kategori.

                                </td>

                            </tr>
                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>

        {{-- Mobile Card --}}
        <div class="md:hidden space-y-4">
            @forelse($kategoris as $kategori)
                <div class="bg-white rounded-3xl shadow-lg p-5">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xl">
                            {{ strtoupper(substr($kategori->nama, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="font-bold text-lg text-gray-800">
                                {{ $kategori->nama }}
                            </h2>
                            <p class="text-sm text-gray-400">
                                Kategori Artikel
                            </p>

                        </div>
                    </div>
                    <div class="mt-5 bg-blue-50 rounded-xl px-4 py-3 flex justify-between">
                        <span>
                            Jumlah Artikel
                        </span>

                        <b class="text-blue-700">
                            {{ $kategori->artikels_count }}
                        </b>

                    </div>
                    <div class="grid grid-cols-3 gap-3 mt-5">
                        <a href="{{ route('admin.kategori.show', $kategori) }}"
                            class="py-3 rounded-xl bg-green-100 text-green-700 text-center hover:bg-green-600 hover:text-white transition">
                            👁
                        </a>
                        <a href="{{ route('admin.kategori.edit', $kategori) }}"
                            class="py-3 rounded-xl bg-yellow-100 text-yellow-700 text-center hover:bg-yellow-500 hover:text-white transition">
                            ✏
                        </a>
                        <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="w-full py-3 rounded-xl bg-red-100 text-red-700 hover:bg-red-600 hover:text-white transition">
                                🗑
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl p-10 text-center text-gray-400">
                    Belum ada kategori.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div>
            {{ $kategoris->links() }}

        </div>
    </div>
@endsection
