<div class="space-y-6">


    {{-- KATEGORI --}}
    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Kategori Artikel
        </label>


        <select name="kategori_id"
            class="
            w-full
            px-4
            py-3
            rounded-xl
            border-gray-300
            focus:border-blue-500
            focus:ring-2
            focus:ring-blue-200
            transition
            ">


            <option value="">
                -- Pilih Kategori --
            </option>



            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ old('kategori_id', $artikel->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>

                    {{ $kategori->nama }}

                </option>
            @endforeach


        </select>



        @error('kategori_id')
            <p class="text-sm text-red-600 mt-2">
                {{ $message }}
            </p>
        @enderror


    </div>








    {{-- JUDUL --}}
    <div>


        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Judul Artikel

        </label>



        <input type="text" name="judul" value="{{ old('judul', $artikel->judul ?? '') }}"
            placeholder="Masukkan judul artikel..."
            class="
            w-full
            px-4
            py-3
            rounded-xl
            border-gray-300
            focus:border-blue-500
            focus:ring-2
            focus:ring-blue-200
            transition
            ">



        @error('judul')
            <p class="text-sm text-red-600 mt-2">
                {{ $message }}
            </p>
        @enderror


    </div>









    {{-- ISI ARTIKEL --}}
    <div>


        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Isi Artikel

        </label>




        <textarea name="isi" rows="8" placeholder="Tulis isi artikel..."
            class="
            w-full
            px-4
            py-3
            rounded-xl
            border-gray-300
            focus:border-blue-500
            focus:ring-2
            focus:ring-blue-200
            transition
            resize-none
            ">{{ old('isi', $artikel->isi ?? '') }}</textarea>




        @error('isi')
            <p class="text-sm text-red-600 mt-2">
                {{ $message }}
            </p>
        @enderror


    </div>









    {{-- GAMBAR --}}
    <div>


        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Gambar Artikel

        </label>



        <div
            class="
            border-2
            border-dashed
            border-gray-300
            rounded-2xl
            p-6
            text-center
            hover:border-blue-500
            transition
            ">


            <input type="file" name="gambar" accept="image/*"
                class="
                w-full
                text-sm
                text-gray-500
                file:mr-4
                file:py-2
                file:px-5
                file:rounded-xl
                file:border-0
                file:bg-blue-600
                file:text-white
                hover:file:bg-blue-700
                ">



            <p class="text-xs text-gray-400 mt-3">

                JPG, PNG maksimal 2MB

            </p>


        </div>





        @if (isset($artikel) && $artikel->gambar)
            <div class="mt-5">


                <p class="text-sm text-gray-600 mb-3">

                    Gambar saat ini:

                </p>



                <img src="{{ asset('storage/' . $artikel->gambar) }}"
                    class="
                    w-full
                    sm:w-52
                    h-40
                    object-cover
                    rounded-2xl
                    shadow
                    ">


            </div>
        @endif






        @error('gambar')
            <p class="text-sm text-red-600 mt-2">

                {{ $message }}

            </p>
        @enderror


    </div>









    {{-- STATUS --}}
    <div>


        <label class="block text-sm font-semibold text-gray-700 mb-2">

            Status Artikel

        </label>



        <select name="status"
            class="
            w-full
            px-4
            py-3
            rounded-xl
            border-gray-300
            focus:border-blue-500
            focus:ring-2
            focus:ring-blue-200
            transition
            ">



            <option value="draft" {{ old('status', $artikel->status ?? '') == 'draft' ? 'selected' : '' }}>

                Draft

            </option>




            <option value="publish" {{ old('status', $artikel->status ?? '') == 'publish' ? 'selected' : '' }}>

                Publish

            </option>



        </select>



        @error('status')
            <p class="text-sm text-red-600 mt-2">

                {{ $message }}

            </p>
        @enderror



    </div>



</div>
