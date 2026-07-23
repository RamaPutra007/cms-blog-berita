<div class="space-y-6">


    {{-- JUDUL --}}

    <div>

        <label class="font-semibold">
            Judul Berita
        </label>


        <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}"
            class="
            w-full
            mt-2
            rounded-xl
            border-gray-300
            focus:ring-2
            focus:ring-blue-500
            "
            placeholder="Masukkan judul berita" required>

    </div>





    {{-- KATEGORI --}}

    <div>

        <label class="font-semibold">
            Kategori
        </label>


        <select name="kategori_id"
            class="
            w-full
            mt-2
            rounded-xl
            border-gray-300
            focus:ring-2
            focus:ring-blue-500
            "
            required>


            <option value="">
                Pilih Kategori
            </option>



            @foreach ($kategoris as $item)
                <option value="{{ $item->id }}"
                    {{ old('kategori_id', $berita->kategori_id ?? '') == $item->id ? 'selected' : '' }}>

                    {{ $item->nama }}

                </option>
            @endforeach


        </select>


    </div>






    {{-- GAMBAR --}}

    <div>


        <label class="font-semibold">
            Gambar Berita
        </label>


        <input type="file" name="gambar"
            class="
            w-full
            mt-2
            rounded-xl
            border-gray-300
            ">



        @if (isset($berita) && $berita->gambar)
            <div class="mt-4">


                <p class="text-sm text-gray-500 mb-2">
                    Gambar saat ini
                </p>


                <img src="{{ asset('storage/' . $berita->gambar) }}"
                    class="
                    w-48
                    h-32
                    object-cover
                    rounded-xl
                    ">


            </div>
        @endif



    </div>







    {{-- STATUS --}}

    <div>


        <label class="font-semibold">
            Status
        </label>



        <select name="status"
            class="
            w-full
            mt-2
            rounded-xl
            border-gray-300
            "
            required>


            <option value="draft" {{ old('status', $berita->status ?? '') == 'draft' ? 'selected' : '' }}>

                Draft

            </option>



            <option value="publish" {{ old('status', $berita->status ?? '') == 'publish' ? 'selected' : '' }}>

                Publish

            </option>



        </select>


    </div>







    {{-- ISI BERITA --}}

    <div>


        <label class="font-semibold">
            Isi Berita
        </label>



        <textarea name="isi" rows="8"
            class="
            w-full
            mt-2
            rounded-xl
            border-gray-300
            focus:ring-2
            focus:ring-blue-500
            "
            placeholder="Tuliskan isi berita..." required>{{ old('isi', $berita->isi ?? '') }}</textarea>


    </div>



</div>
