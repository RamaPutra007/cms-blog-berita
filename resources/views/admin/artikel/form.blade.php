<div class="bg-white rounded-3xl shadow-xl p-6 md:p-8 space-y-7">


    {{-- Judul --}}

    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Judul Artikel
        </label>


        <input
            type="text"
            name="judul"
            placeholder="Masukkan judul artikel..."
            value="{{ old('judul',$artikel->judul ?? '') }}"
            class="w-full px-4 py-3 rounded-xl
            border border-gray-300
            focus:ring-2 focus:ring-blue-500
            focus:border-blue-500
            outline-none
            transition duration-300">


        @error('judul')

        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>

        @enderror


    </div>






    {{-- Kategori --}}

    <div>


        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Kategori Artikel

        </label>



        <select
            name="kategori_id"
            class="w-full px-4 py-3 rounded-xl
            border border-gray-300
            bg-white
            focus:ring-2 focus:ring-blue-500
            focus:border-blue-500
            outline-none
            transition">


            <option value="">
                -- Pilih Kategori --
            </option>



            @foreach($kategoris as $kategori)


            <option
            value="{{ $kategori->id }}"
            @selected(old('kategori_id',$artikel->kategori_id ?? '')==$kategori->id)>


                {{ $kategori->nama }}


            </option>


            @endforeach



        </select>




        @error('kategori_id')

        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>

        @enderror


    </div>







    {{-- Isi Artikel --}}

    <div>


        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Isi Artikel

        </label>



        <textarea
            name="isi"
            rows="10"
            placeholder="Tulis isi artikel..."
            class="w-full px-4 py-3 rounded-xl
            border border-gray-300
            focus:ring-2 focus:ring-blue-500
            focus:border-blue-500
            outline-none
            resize-none
            transition">{{ old('isi',$artikel->isi ?? '') }}</textarea>




        @error('isi')

        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>

        @enderror


    </div>







    {{-- Upload Gambar --}}

    <div>


        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Gambar Artikel

        </label>



        <div class="border-2 border-dashed
        border-gray-300 rounded-2xl
        p-6
        hover:border-blue-500
        transition">


            <input
            type="file"
            name="gambar"
            class="w-full text-sm
            text-gray-600
            file:mr-4
            file:py-2
            file:px-5
            file:rounded-full
            file:border-0
            file:bg-blue-600
            file:text-white
            hover:file:bg-blue-700">


        </div>





        @if(isset($artikel) && $artikel->gambar)


        <div class="mt-5">


            <p class="text-sm text-gray-500 mb-2">
                Gambar saat ini:
            </p>



            <img
            src="{{ asset('storage/'.$artikel->gambar) }}"
            class="w-48 h-32
            object-cover
            rounded-2xl
            shadow-md
            hover:scale-105
            transition duration-300">


        </div>


        @endif



        @error('gambar')

        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>

        @enderror


    </div>







    {{-- Tombol --}}

    <div class="flex flex-col sm:flex-row gap-4 pt-5 border-t">



        <button
        type="submit"
        class="flex-1
        px-6 py-3
        bg-blue-600
        text-white
        rounded-xl
        shadow-md
        hover:bg-blue-700
        hover:shadow-xl
        hover:-translate-y-1
        transition duration-300">


            💾 Simpan Artikel


        </button>





        <a href="{{ route('admin.artikel.index') }}"
        class="flex-1 text-center
        px-6 py-3
        bg-gray-100
        text-gray-700
        rounded-xl
        shadow-md
        hover:bg-gray-200
        hover:shadow-xl
        hover:-translate-y-1
        transition duration-300">


            ← Kembali


        </a>



    </div>



</div>  