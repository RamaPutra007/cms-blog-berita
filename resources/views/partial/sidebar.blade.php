<aside class="w-72 bg-slate-950 text-white min-h-screen flex flex-col shadow-xl">

    {{-- LOGO --}}
    <div class="px-6 py-6 border-b border-slate-800">

        <a href="{{ route('home') }}">
            <h1 class="text-2xl font-bold text-blue-400 hover:text-blue-300 transition">
                Sudiang Info
            </h1>

            <p class="text-sm text-gray-400">
                CMS Dashboard
            </p>
        </a>

    </div>



    {{-- USER --}}
    <div class="px-6 py-5 border-b border-slate-800">

        <h2 class="font-bold text-lg">
            {{ auth()->user()->name }}
        </h2>

        <p class="text-sm text-gray-400">
            {{ ucfirst(auth()->user()->role) }}
        </p>

    </div>




    {{-- MENU --}}
    <nav class="flex-1 px-4 py-6 space-y-3">


        {{-- DASHBOARD --}}
        <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('penulis.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            hover:bg-blue-600
            {{ request()->routeIs('*dashboard') ? 'bg-blue-600' : '' }}">

            📊

            <span>
                Dashboard
            </span>

        </a>






        {{-- PENULIS --}}
        @if (auth()->user()->role == 'penulis')
            <a href="{{ route('penulis.artikel.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                hover:bg-blue-600
                {{ request()->routeIs('penulis.artikel.*') ? 'bg-blue-600' : '' }}">

                📰

                <span>
                    Artikel Saya
                </span>

            </a>





            <a href="{{ route('penulis.berita.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                hover:bg-blue-600
                {{ request()->routeIs('penulis.berita.*') ? 'bg-blue-600' : '' }}">

                📢

                <span>
                    Berita Saya
                </span>

            </a>





            <a href="{{ route('penulis.komentar.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                hover:bg-blue-600
                {{ request()->routeIs('penulis.komentar.*') ? 'bg-blue-600' : '' }}">

                💬

                <span>
                    Komentar
                </span>

            </a>





            <a href="{{ route('penulis.profile') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                hover:bg-blue-600
                {{ request()->routeIs('penulis.profile') ? 'bg-blue-600' : '' }}">

                👤

                <span>
                    Profil
                </span>

            </a>
        @endif






        {{-- ADMIN --}}
        @if (auth()->user()->role == 'admin')
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600">

                👤
                <span>
                    Pengguna
                </span>

            </a>


            <a href="{{ route('admin.kategori.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600">

                📂
                <span>
                    Kategori
                </span>

            </a>


            <a href="{{ route('admin.artikel.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600">

                ✍️
                <span>
                    Artikel
                </span>

            </a>


            <a href="{{ route('admin.berita.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600">

                📰
                <span>
                    Berita
                </span>

            </a>


            <a href="{{ route('admin.komentar.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600">

                💬
                <span>
                    Komentar
                </span>

            </a>
        @endif


    </nav>





    {{-- LOGOUT --}}
    <div class="p-4 border-t border-slate-800">


        <form action="{{ route('logout') }}" method="POST">

            @csrf


            <button
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                text-red-400 hover:bg-red-600 hover:text-white transition">


                🚪

                <span>
                    Logout
                </span>


            </button>


        </form>


    </div>


</aside>
