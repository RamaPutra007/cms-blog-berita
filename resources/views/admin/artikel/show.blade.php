@extends('layouts.admin')

@section('title', 'Detail Artikel')

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            {{-- GAMBAR --}}
            @if ($artikel->gambar)
                <img src="{{ Storage::url($artikel->gambar) }}" class="w-full h-96 object-cover">
            @else
                <div class="h-96 bg-gray-100 flex items-center justify-center text-gray-400">
                    Tidak ada gambar
                </div>
            @endif
            <div class="p-6 md:p-8">
                {{-- INFO ARTIKEL --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm">
                        📂 {{ $artikel->kategori->nama ?? '-' }}
                    </span>
                    <span class="px-4 py-2 rounded-full bg-purple-100 text-purple-700 text-sm">
                        👤 {{ $artikel->user->name ?? '-' }}
                    </span>


                    @if ($artikel->status == 'publish')
                        <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm">
                            ✅ Publish
                        </span>
                    @else
                        <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                            📝 Draft
                        </span>
                    @endif


                </div>
                {{-- JUDUL --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-5">

                    {{ $artikel->judul }}

                </h1>
                {{-- TANGGAL --}}
                <div class="flex flex-wrap gap-5 text-sm text-gray-500 mb-6">

                    <span>
                        📅 Dibuat:
                        {{ $artikel->created_at->format('d M Y H:i') }}
                    </span>


                    <span>
                        🔄 Update:
                        {{ $artikel->updated_at->format('d M Y H:i') }}
                    </span>


                </div>
                <hr class="mb-6">
                {{-- ISI ARTIKEL --}}
                <div class="text-gray-700 leading-8 text-lg">

                    {!! nl2br(e($artikel->isi)) !!}

                </div>


            </div>

        </div>
        {{-- BUTTON --}}
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('admin.artikel.edit', $artikel) }}"
                class="px-6 py-3 rounded-xl bg-yellow-500 text-white
            hover:bg-yellow-600 shadow-lg transition">
                ✏ Edit
            </a>
            <a href="{{ route('admin.artikel.index') }}"
                class="px-6 py-3 rounded-xl bg-gray-600 text-white
            hover:bg-gray-700 shadow-lg transition">

                ← Kembali
            </a>
            <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST"
                onsubmit="return confirm('Hapus artikel ini?')">

                @csrf
                @method('DELETE')


                <button
                    class="px-6 py-3 rounded-xl bg-red-600 text-white
                hover:bg-red-700 shadow-lg transition">

                    🗑 Hapus

                </button>

            </form>
        </div>
    </div>
@endsection
