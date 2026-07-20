<nav class="lg:hidden sticky top-0 z-40 bg-white shadow">

    <div class="flex items-center justify-between h-16 px-4">

        {{-- Hamburger --}}
        <button id="openSidebar" class="p-2 rounded-lg hover:bg-gray-100 transition shrink-0">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

            </svg>

        </button>


        {{-- Nama + Foto Profil --}}
        <div class="flex items-center gap-2">

            <span class="block truncate text-xs font-semibold text-slate-700">

                {{ auth()->user()->name }}

            </span>


            <img src="{{ auth()->user()->foto ? asset('storage/profile/' . auth()->user()->foto) : asset('images/default-user.png') }}"
                alt="{{ auth()->user()->name }}"
                class="w-9 h-9 rounded-full object-cover border-2 border-blue-500 shadow">

        </div>

    </div>

</nav>
