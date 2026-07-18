<nav class="bg-white shadow sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-20">

            <a href="{{ route('home') }}" class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold">

                    SI

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

            <div class="hidden md:flex gap-8">
                <a href="{{ route('home') }}">Beranda</a>

                <a href="{{ route('berita.index') }}">Berita</a>

                <a href="{{ route('blog.index') }}">Blog</a>

                <a href="{{ route('kategori.index') }}">Kategori</a>

                <a href="{{ route('tentang') }}">Tentang</a>
            </div>

            <div>

                @guest

                <a href="{{ route('login') }}"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg">

                    Login

                </a>

                @else

                <a href="{{ route('dashboard') }}"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg">

                    Dashboard

                </a>

                @endguest

            </div>

        </div>

    </div>

</nav>