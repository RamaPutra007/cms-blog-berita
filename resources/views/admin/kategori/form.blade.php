<div class="bg-white rounded-3xl shadow-xl p-6 md:p-8">

    {{-- Nama Kategori --}}
    <div class="mb-7">

        <label class="block text-sm font-semibold text-gray-700 mb-3">
            📂 Nama Kategori
        </label>

        <input type="text" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}"
            placeholder="Contoh: Teknologi"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

        @error('nama')
            <div class="mt-3 bg-red-50 border border-red-200 rounded-xl px-4 py-3 text-red-600 text-sm">
                {{ $message }}
            </div>
        @enderror

    </div>

    @isset($kategori)
        <div class="mb-6 bg-gray-50 rounded-xl border p-5">

            <p class="text-sm text-gray-500">
                Preview
            </p>

            <h3 class="mt-2 text-xl font-bold">
                {{ $kategori->nama }}
            </h3>

            <p class="text-sm text-gray-500">
                Slug:
                <span class="font-medium">
                    {{ $kategori->slug }}
                </span>
            </p>

        </div>
    @endisset

    <div class="flex flex-col sm:flex-row gap-4 pt-5 border-t">

        <button type="submit"
            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white rounded-xl py-3 font-semibold transition">

            💾 Simpan Kategori

        </button>

        <a href="{{ route('admin.kategori.index') }}"
            class="flex-1 bg-gray-100 hover:bg-gray-200 text-center rounded-xl py-3 font-semibold transition">

            ← Kembali

        </a>

    </div>

</div>
