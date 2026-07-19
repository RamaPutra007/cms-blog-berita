<div>

    <label class="font-semibold">
        Kategori
    </label>


    <select name="kategori_id" class="w-full mt-2 rounded-xl border-gray-300" required>


        <option value="">
            Pilih Kategori
        </option>



        @foreach ($kategori as $item)
            <option value="{{ $item->id }}"
                {{ old('kategori_id', $artikel->kategori_id ?? '') == $item->id ? 'selected' : '' }}>

                {{ $item->nama }}

            </option>
        @endforeach


    </select>


</div>
