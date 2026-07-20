<div class="bg-white rounded-xl shadow p-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Nama --}}
        <div>
            <label class="block mb-2 font-medium">
                Nama
            </label>

            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

            @error('name')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-2 font-medium">
                Email
            </label>

            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label class="block mb-2 font-medium">
                Password
            </label>

            <input type="password" name="password"
                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

            @error('password')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div>
            <label class="block mb-2 font-medium">
                Konfirmasi Password
            </label>

            <input type="password" name="password_confirmation"
                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
        </div>

        {{-- Role --}}
        <div class="md:col-span-2">

            <label class="block mb-2 font-medium">
                Role
            </label>

            <select name="role" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                <option value="">-- Pilih Role --</option>

                <option value="admin" @selected(old('role', $user->role ?? '') == 'admin')>

                    Admin

                </option>

                <option value="penulis" @selected(old('role', $user->role ?? '') == 'penulis')>

                    Penulis

                </option>

            </select>

            @error('role')
                <small class="text-red-500">{{ $message }}</small>
            @enderror

        </div>

    </div>

    <div class="mt-8 flex gap-3">

        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">

            Simpan

        </button>

        <a href="{{ route('admin.users.index') }}"
            class="px-6 py-3 bg-gray-300 hover:bg-gray-400 rounded-lg transition">

            Kembali

        </a>

    </div>

</div>
