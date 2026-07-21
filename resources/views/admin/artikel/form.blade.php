<div class="space-y-6">

    {{-- Judul --}}
    <div>

        <label class="font-semibold text-gray-700">
            Judul Artikel
        </label>

        <input type="text" name="judul" value="{{ old('judul', $artikel->judul ?? '') }}"
            class="mt-2 w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Masukkan judul artikel">

        @error('judul')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Isi --}}
    <div>

        <label class="font-semibold text-gray-700">
            Isi Artikel
        </label>

        <textarea name="isi" rows="8"
            class="mt-2 w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Tulis artikel...">{{ old('isi', $artikel->isi ?? '') }}</textarea>

        @error('isi')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Gambar --}}
    <div>

        <label class="font-semibold text-gray-700">
            Upload Gambar
        </label>

        <input type="file" name="gambar" class="mt-2 w-full border rounded-xl p-3">

    </div>

    {{-- Status --}}
    <div>

        <label class="font-semibold text-gray-700">
            Status
        </label>

        <select name="status" class="mt-2 w-full rounded-xl border-gray-300">

            <option value="draft" {{ old('status', $artikel->status ?? '') == 'draft' ? 'selected' : '' }}>
                Draft
            </option>

            <option value="publish" {{ old('status', $artikel->status ?? '') == 'publish' ? 'selected' : '' }}>
                Publish
            </option>

        </select>

    </div>

    {{-- Tombol --}}
    <div class="flex flex-col sm:flex-row gap-3 pt-4">

        <button type="submit"
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">

            {{ isset($artikel) ? '💾 Update Artikel' : '💾 Simpan Artikel' }}

        </button>

        <a href="{{ route('admin.artikel.index') }}"
            class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl font-semibold text-center transition">

            ← Kembali

        </a>

    </div>

</div>
