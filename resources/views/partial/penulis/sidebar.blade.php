{{-- ================= MOBILE MENU ================= --}}
<div id="sidebar"
    class="fixed top-16 left-0 right-0
    bg-white text-slate-800
    border-t border-gray-200
    shadow-xl
    max-h-0 overflow-hidden
    transition-all duration-300 ease-in-out
    lg:hidden z-40">


    {{-- Menu --}}
    <nav class="p-4 space-y-2">

        <a href="{{ route('penulis.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">

            📊 <span>Dashboard</span>

        </a>

        <a href="{{ route('penulis.artikel.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.artikel.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">

            📰 <span>Artikel</span>

        </a>

        <a href="{{ route('penulis.berita.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.berita.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">

            📢 <span>Berita</span>

        </a>

        <a href="{{ route('penulis.komentar.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.komentar.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">

            💬 <span>Komentar</span>

        </a>

        <a href="{{ route('penulis.profile') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.profile') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">

            👤 <span>Profil</span>

        </a>

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button class="w-full mt-4 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold transition">

                🚪 Logout

            </button>

        </form>

    </nav>

</div>


{{-- ================= DESKTOP SIDEBAR ================= --}}
<aside class="hidden lg:flex fixed left-0 top-0 w-72 h-screen bg-slate-950 text-white flex-col shadow-xl">

    {{-- Logo --}}
    <div class="px-6 py-6 border-b border-slate-800">

        <h1 class="text-2xl font-bold text-blue-400">
            Sudiang Info
        </h1>

        <p class="text-sm text-slate-400">
            Dashboard Penulis
        </p>

    </div>

    {{-- User --}}
    <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-800">

        <img src="{{ auth()->user()->foto
            ? asset('storage/profile/' . auth()->user()->foto)
            : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
            class="w-12 h-12 rounded-full object-cover border-2 border-blue-500">

        <div>

            <h2 class="font-semibold">

                {{ auth()->user()->name }}

            </h2>

            <p class="text-sm text-slate-400">

                {{ ucfirst(auth()->user()->role) }}

            </p>

        </div>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        <a href="{{ route('penulis.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.dashboard') ? 'bg-blue-600' : 'hover:bg-slate-800' }}">

            📊 Dashboard

        </a>

        <a href="{{ route('penulis.artikel.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.artikel.*') ? 'bg-blue-600' : 'hover:bg-slate-800' }}">

            📰 Artikel

        </a>

        <a href="{{ route('penulis.berita.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.berita.*') ? 'bg-blue-600' : 'hover:bg-slate-800' }}">

            📢 Berita

        </a>

        <a href="{{ route('penulis.komentar.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.komentar.*') ? 'bg-blue-600' : 'hover:bg-slate-800' }}">

            💬 Komentar

        </a>

        <a href="{{ route('penulis.profile') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('penulis.profile') ? 'bg-blue-600' : 'hover:bg-slate-800' }}">

            👤 Profil

        </a>

    </nav>

    {{-- Logout --}}
    <div class="p-4 border-t border-slate-800">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button class="w-full py-3 rounded-xl bg-red-600 hover:bg-red-700 transition">

                🚪 Logout

            </button>

        </form>

    </div>

</aside>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const menu = document.getElementById('sidebar');
        const button = document.getElementById('openSidebar');

        button.addEventListener('click', () => {

            if (menu.classList.contains('max-h-0')) {

                menu.classList.remove('max-h-0');
                menu.classList.add('max-h-screen');

            } else {

                menu.classList.remove('max-h-screen');
                menu.classList.add('max-h-0');

            }

        });

    });
</script>
