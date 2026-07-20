<header class="sticky top-0 z-30 bg-white border-b border-gray-200 shadow-sm">

    <div class="flex items-center justify-between h-16 px-6">

        {{-- Kiri --}}
        <div class="flex items-center gap-4">

            {{-- Tombol Sidebar Mobile --}}
            <button id="openSidebar"
                class="lg:hidden w-10 h-10 rounded-lg bg-slate-100 hover:bg-slate-200 flex items-center justify-center transition">

                ☰

            </button>

            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Dashboard Admin
                </h1>

                <p class="text-sm text-gray-500">
                    Kelola seluruh sistem CMS
                </p>

            </div>

        </div>

        {{-- Kanan --}}
        <div class="flex items-center gap-4">

            {{-- User --}}
            <div class="flex items-center gap-3">

                <div
                    class="w-11 h-11 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

                <div class="hidden md:block">

                    <h2 class="font-semibold">

                        {{ auth()->user()->name }}

                    </h2>

                    <p class="text-sm text-gray-500">

                        Administrator

                    </p>

                </div>

            </div>

        </div>

    </div>

</header>
