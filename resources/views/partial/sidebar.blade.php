<aside class="w-72 bg-slate-950 text-white min-h-screen flex flex-col shadow-xl">

    {{-- Logo --}}
    <div class="px-6 py-6 border-b border-slate-800">

        <h1 class="text-2xl font-bold text-blue-400">
            Sudiang Info
        </h1>

        <p class="text-sm text-gray-400">
            CMS Dashboard
        </p>

    </div>

    {{-- User --}}
    <div class="px-6 py-5 border-b border-slate-800">

        <p class="font-semibold text-lg">
            {{ auth()->user()->name }}
        </p>

        <p class="text-sm text-gray-400">
            {{ ucfirst(auth()->user()->role) }}
        </p>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-300
            hover:bg-blue-600 hover:text-white
            {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : '' }}">

            📊
            <span>Dashboard</span>

        </a>

        {{-- Pengguna --}}
        <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-300
            hover:bg-blue-600 hover:text-white
            {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white' : '' }}">

            👤
            <span>Pengguna</span>

        </a>

        {{-- Kategori --}}
        <a href="{{ route('admin.kategori.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-300
            hover:bg-blue-600 hover:text-white
            {{ request()->routeIs('admin.kategori.*') ? 'bg-blue-600 text-white' : '' }}">

            📂
            <span>Kategori</span>

        </a>

        {{-- Berita --}}
        <a href="{{ route('admin.berita.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-300
            hover:bg-blue-600 hover:text-white
            {{ request()->routeIs('admin.berita.*') ? 'bg-blue-600 text-white' : '' }}">

            📰
            <span>Berita</span>

        </a>

        {{-- Blog --}}
        <a href="{{ route('admin.artikel.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-300
            hover:bg-blue-600 hover:text-white
            {{ request()->routeIs('admin.artikel.*') ? 'bg-blue-600 text-white' : '' }}">

            ✍️
            <span>Blog</span>

        </a>

        {{-- Komentar --}}
        <a href="{{ route('admin.komentar.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-300
            hover:bg-blue-600 hover:text-white
            {{ request()->routeIs('admin.komentar.*') ? 'bg-blue-600 text-white' : '' }}">

            💬
            <span>Komentar</span>

        </a>

    </nav>

    {{-- Logout --}}
    <div class="p-4 border-t border-slate-800">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                text-red-400 hover:bg-red-600 hover:text-white
                transition duration-300">

                🚪
                <span>Logout</span>

            </button>

        </form>

    </div>

</aside>