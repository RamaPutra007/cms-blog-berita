<div class="space-y-6">


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






    <div>

        <label class="font-semibold text-gray-700">
            Upload Gambar
        </label>


        <input type="file" name="gambar" class="mt-2 w-full border rounded-xl p-3">


    </div>







    <div>

        <label class="font-semibold text-gray-700">
            Status
        </label>


        <select name="status" class="mt-2 w-full rounded-xl border-gray-300">


            <option value="draft">
                Draft
            </option>


            <option value="publish">
                Publish
            </option>


        </select>


    </div>



</div>
