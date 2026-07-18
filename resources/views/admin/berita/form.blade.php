<div class="bg-white rounded-xl shadow p-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


        {{-- Judul --}}
        <div class="md:col-span-2">

            <label class="block mb-2 font-medium">
                Judul Berita
            </label>


            <input
                type="text"
                name="judul"
                value="{{ old('judul',$berita->judul ?? '') }}"
                class="w-full rounded-lg border-gray-300 
                focus:border-blue-500 focus:ring-blue-500">


            @error('judul')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>



        {{-- Kategori --}}
        <div>

            <label class="block mb-2 font-medium">
                Kategori
            </label>


            <select
                name="kategori_id"
                class="w-full rounded-lg border-gray-300 
                focus:border-blue-500 focus:ring-blue-500">


                <option value="">
                    -- Pilih Kategori --
                </option>


                @foreach($kategoris as $kategori)

                <option value="{{ $kategori->id }}"
                    
                    @selected(
                        old(
                            'kategori_id',
                            $berita->kategori_id ?? ''
                        )
                        ==
                        $kategori->id
                    )>

                    {{ $kategori->nama }}

                </option>

                @endforeach


            </select>


            @error('kategori_id')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror


        </div>




        {{-- Status --}}
        <div>

            <label class="block mb-2 font-medium">
                Status
            </label>


            <select
                name="status"
                class="w-full rounded-lg border-gray-300 
                focus:border-blue-500 focus:ring-blue-500">


                <option value="draft"
                @selected(old('status',$berita->status ?? '')=='draft')>

                    Draft

                </option>


                <option value="publish"
                @selected(old('status',$berita->status ?? '')=='publish')>

                    Publish

                </option>


            </select>


            @error('status')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror


        </div>




        {{-- Gambar --}}
        <div class="md:col-span-2">


            <label class="block mb-2 font-medium">
                Gambar Berita
            </label>


            <input
                type="file"
                name="gambar"
                class="w-full rounded-lg border-gray-300">


            @error('gambar')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror



            @isset($berita)

                @if($berita->gambar)

                <div class="mt-4">

                    <img
                    src="{{ asset('storage/'.$berita->gambar) }}"
                    class="w-40 rounded-lg shadow">


                </div>

                @endif

            @endisset


        </div>




        {{-- Isi --}}
        <div class="md:col-span-2">


            <label class="block mb-2 font-medium">
                Isi Berita
            </label>


            <textarea
                name="isi"
                rows="8"
                class="w-full rounded-lg border-gray-300 
                focus:border-blue-500 focus:ring-blue-500">{{ old('isi',$berita->isi ?? '') }}</textarea>



            @error('isi')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror


        </div>


    </div>



    {{-- Tombol --}}

    <div class="mt-8 flex gap-3">


        <button
            type="submit"
            class="px-6 py-3 rounded-lg
            bg-blue-600 text-white
            hover:bg-blue-700
            transition duration-300">

            💾 Simpan

        </button>



        <a href="{{ route('admin.berita.index') }}"
            class="px-6 py-3 rounded-lg
            bg-gray-300
            hover:bg-gray-400
            transition duration-300">

            ↩ Kembali

        </a>


    </div>


</div>