<div class="bg-white rounded-3xl shadow-xl p-6 md:p-8">


    {{-- Nama Kategori --}}

    <div class="mb-7">


        <label class="block text-sm font-semibold text-gray-700 mb-3">

            📂 Nama Kategori

        </label>




        <input
            type="text"
            name="nama"
            value="{{ old('nama', $kategori->nama ?? '') }}"
            placeholder="Contoh: Teknologi, Olahraga, Pendidikan..."

            class="w-full px-4 py-3 rounded-xl

            border border-gray-300

            focus:ring-2
            focus:ring-blue-500

            focus:border-blue-500

            outline-none

            transition duration-300

            hover:border-blue-400"

        >




        @error('nama')

        <div class="mt-3 flex items-center gap-2
        text-sm text-red-600
        bg-red-50
        border border-red-200
        rounded-lg
        px-4 py-3">


            ⚠️

            {{ $message }}


        </div>


        @enderror



    </div>







    {{-- Preview --}}

    @if(isset($kategori))


    <div class="mb-6
    bg-gray-50
    rounded-xl
    p-4
    border">


        <p class="text-sm text-gray-500">

            Preview Kategori

        </p>


        <div class="mt-3 flex items-center gap-3">


            <div class="w-12 h-12 rounded-full
            bg-blue-600
            text-white
            flex items-center justify-center
            font-bold text-lg">


                {{ strtoupper(substr($kategori->nama,0,1)) }}


            </div>



            <div>

                <p class="font-semibold text-gray-800">

                    {{ $kategori->nama }}

                </p>


                <span class="text-sm text-gray-400">

                    Kategori Artikel

                </span>


            </div>



        </div>


    </div>


    @endif







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


            💾 Simpan Kategori


        </button>







        <a href="{{ route('admin.kategori.index') }}"

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