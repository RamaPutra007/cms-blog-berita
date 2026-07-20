@extends('layouts.admin')

@section('title', 'Detail Kategori')

@section('content')

    <div class="max-w-6xl mx-auto space-y-6">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    📂 Detail Kategori
                </h1>

                <p class="text-gray-500 mt-1">
                    Informasi lengkap kategori beserta daftar artikel.
                </p>
            </div>

            <a href="{{ route('admin.kategori.index') }}"
                class="inline-flex items-center justify-center px-5 py-3 bg-slate-800 hover:bg-slate-900 text-white rounded-xl transition shadow">

                ← Kembali

            </a>

        </div>

        {{-- Card Detail --}}
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white">

                <h2 class="text-3xl font-bold">

                    {{ $kategori->nama }}

                </h2>

                <p class="mt-2 text-blue-100">

                    Detail kategori artikel

                </p>

            </div>

            <div class="p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-slate-50 rounded-2xl p-6">

                        <p class="text-sm text-gray-500 mb-2">

                            Slug

                        </p>

                        <span class="inline-flex px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold">

                            {{ $kategori->slug }}

                        </span>

                    </div>

                    <div class="bg-slate-50 rounded-2xl p-6">

                        <p class="text-sm text-gray-500 mb-2">

                            Total Artikel

                        </p>

                        <span class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 font-bold">

                            {{ $kategori->artikels->count() }} Artikel

                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- Daftar Artikel --}}
        <div class="bg-white rounded-3xl shadow-lg p-8">

            <div class="flex items-center justify-between mb-6">

                <h2 class="text-2xl font-bold text-gray-800">

                    📰 Daftar Artikel

                </h2>

                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold">

                    {{ $kategori->artikels->count() }} Artikel

                </span>

            </div>

            @if ($kategori->artikels->count())

                <div class="space-y-4">

                    @foreach ($kategori->artikels as $artikel)
                        <div
                            class="border border-gray-200 rounded-2xl p-5 hover:shadow-lg hover:border-blue-500 transition">

                            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                                <div>

                                    <h3 class="text-lg font-bold text-gray-800">

                                        {{ $artikel->judul }}

                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">

                                        {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 120) }}

                                    </p>

                                </div>

                                <div class="flex items-center gap-3">

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                                        {{ $artikel->created_at->format('d M Y') }}

                                    </span>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="text-center py-16 border-2 border-dashed border-gray-300 rounded-3xl">

                    <div class="text-6xl mb-4">

                        📭

                    </div>

                    <h3 class="text-xl font-bold text-gray-700">

                        Belum Ada Artikel

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Kategori ini belum memiliki artikel.

                    </p>

                </div>

            @endif

        </div>

    </div>

@endsection
