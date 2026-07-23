<div class="space-y-6">


    <div>

        <label class="font-semibold">
            Kategori
        </label>


        <select name="kategori_id" class="mt-2 w-full rounded-xl border-gray-300">


            <option value="">
                -- Pilih Kategori --
            </option>


            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ old('kategori_id', $berita->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>


                    {{ $kategori->nama }}


                </option>
            @endforeach


        </select>

    </div>






    <div>

        <label class="font-semibold">
            Judul Berita
        </label>


        <input name="judul" value="{{ old('judul', $berita->judul ?? '') }}"
            class="mt-2 w-full rounded-xl border-gray-300">


    </div>







    <div>

        <label class="font-semibold">
            Isi Berita
        </label>


        <textarea name="isi" rows="8" class="mt-2 w-full rounded-xl border-gray-300">

{{ old('isi', $berita->isi ?? '') }}

</textarea>


    </div>








    <div>

        <label class="font-semibold">
            Gambar
        </label>


        <input type="file" name="gambar" class="mt-2 w-full">



        @if (isset($berita) && $berita->gambar)
            <img src="{{ Storage::url($berita->gambar) }}" class="mt-4 w-40 h-32 object-cover rounded-xl">
        @endif


    </div>








    <div>

        <label class="font-semibold">
            Status
        </label>


        <select name="status" class="mt-2 w-full rounded-xl border-gray-300">


            <option value="draft">
                Draft
            </option>


            <option value="publish" @if (isset($berita) && $berita->status == 'publish') selected @endif>
                Publish
            </option>


        </select>


    </div>


</div>
