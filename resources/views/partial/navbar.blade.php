<nav x-data="{ open: false }" class="bg-white shadow sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">

                <div
                    class="w-14 h-14 rounded-full 
        bg-white 
        shadow-xl 
        border-2 border-blue-100
        flex items-center justify-center
        overflow-hidden
        group-hover:border-blue-500
        transition duration-300">

                    <img src="{{ asset('storage/profile/c.png') }}" alt="Sudiang Info"
                        class="w-full h-full object-contain p-2
            group-hover:scale-110 transition duration-300">

                </div>
                <div>
                    <h1 class="font-bold text-xl">
                        Sudiang Info
                    </h1>

                    <p class="text-xs text-gray-500">
                        Informasi Terpercaya
                    </p>
                </div>

            </a>

            <!-- Menu Desktop -->
            <div class="hidden md:flex items-center gap-8">

                <a href="{{ route('home') }}" class="hover:text-blue-600 transition">
                    Beranda
                </a>

                <a href="{{ route('berita.index') }}" class="hover:text-blue-600 transition">
                    Berita
                </a> 

                <a href="{{ route('blog.index') }}" class="hover:text-blue-600 transition">
                    Artikel
                </a>

                <a href="{{ route('kategori.index') }}" class="hover:text-blue-600 transition">
                    Kategori
                </a>

                <a href="{{ route('tentang') }}" class="hover:text-blue-600 transition">
                    Tentang
                </a>

            </div>

            <!-- Tombol Login -->
            <div class="hidden md:block">

                @guest

                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                        Login

                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                        Dashboard

                    </a>

                @endguest

            </div>

            <!-- Hamburger -->
            <button @click="open = !open" class="md:hidden">

                ☰

            </button>

        </div>

    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden bg-white border-t">

        <a href="{{ route('home') }}" class="block px-6 py-3">Beranda</a>

        <a href="{{ route('berita.index') }}" class="block px-6 py-3">Berita</a>

        <a href="{{ route('blog.index') }}" class="block px-6 py-3">Blog</a>

        <a href="{{ route('kategori.index') }}" class="block px-6 py-3">Kategori</a>

        <a href="{{ route('tentang') }}" class="block px-6 py-3">Tentang</a>

        <div class="p-6 border-t">

            @guest

                <a href="{{ route('login') }}" class="block text-center bg-blue-600 text-white py-3 rounded-lg">

                    Login

                </a>
            @else
                <a href="{{ route('dashboard') }}" class="block text-center bg-green-600 text-white py-3 rounded-lg">

                    Dashboard

                </a>

            @endguest

        </div>

    </div>

</nav>
