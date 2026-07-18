@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')

<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Detail Berita
        </h1>

        <p class="text-gray-500 mt-1">
            Informasi lengkap berita.
        </p>

    </div>

    <div class="flex gap-3">

        <a href="{{ route('admin.berita.edit', $berita) }}"
            class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg shadow hover:shadow-lg transition-all duration-300">

            ✏ Edit

        </a>

        <a href="{{ route('admin.berita.index') }}"
            class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg shadow hover:shadow-lg transition-all duration-300">

            ← Kembali

        </a>

    </div>

</div>


<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    {{-- Gambar --}}
    @if($berita->gambar)

    <img
        src="{{ asset('storage/'.$berita->gambar) }}"
        class="w-full h-80 object-cover hover:scale-105 transition duration-500">

    @else

    <div class="h-80 bg-gray-100 flex items-center justify-center text-gray-400 text-xl">

        Tidak ada gambar

    </div>

    @endif


    <div class="p-8">

        <div class="flex flex-wrap gap-3 mb-5">

            <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm">

                📂 {{ $berita->kategori->nama }}

            </span>

            <span class="bg-purple-100 text-purple-700 px-4 py-1 rounded-full text-sm">

                👤 {{ $berita->user->name }}

            </span>

            @if($berita->status=='publish')

                <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">

                    ✅ Publish

                </span>

            @else

                <span class="bg-yellow-100 text-yellow-700 px-4 py-1 rounded-full text-sm">

                    📝 Draft

                </span>

            @endif

        </div>


        <h2 class="text-4xl font-bold text-gray-800 mb-6">

            {{ $berita->judul }}

        </h2>


        <div class="text-gray-500 mb-6 flex flex-wrap gap-6">

            <span>

                📅 Dibuat :
                {{ $berita->created_at->format('d M Y H:i') }}

            </span>

            <span>

                🔄 Diubah :
                {{ $berita->updated_at->format('d M Y H:i') }}

            </span>

        </div>


        <hr class="mb-6">


        <div class="prose max-w-none leading-8 text-gray-700">

            {!! nl2br(e($berita->isi)) !!}

        </div>

    </div>

</div>


<div class="mt-8 flex gap-3">

    <a href="{{ route('admin.berita.edit',$berita) }}"
        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow hover:shadow-xl transition-all duration-300">

        ✏ Edit Berita

    </a>


    <form
        action="{{ route('admin.berita.destroy',$berita) }}"
        method="POST"
        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

        @csrf
        @method('DELETE')

        <button
            class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl shadow hover:shadow-xl transition-all duration-300">

            🗑 Hapus Berita

        </button>

    </form>

</div>

@endsection