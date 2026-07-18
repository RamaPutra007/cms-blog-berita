@extends('layouts.public')

@section('title', 'Tentang')

@section('content')

<!-- Hero -->
<section class="bg-gradient-to-br from-blue-50 to-slate-100 py-20">

    <div class="max-w-7xl mx-auto px-6">

        <span class="uppercase tracking-widest text-blue-600 font-semibold">
            Tentang Kami
        </span>

        <h1 class="text-5xl font-bold mt-3 text-gray-900">
            Tentang Sudiang Info
        </h1>

        <p class="mt-6 text-lg text-gray-600 max-w-3xl">
            Sudiang Info merupakan portal berita dan blog digital yang
            menyajikan informasi terpercaya, artikel edukatif,
            serta berbagai berita terbaru mengenai masyarakat,
            pendidikan, teknologi, ekonomi, olahraga, dan berbagai
            peristiwa lainnya.
        </p>

    </div>

</section>

<!-- Tentang -->
<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <h2 class="text-center text-5xl font-black text-blue-600 mb-14">

                Menyajikan Informasi Terpercaya
                untuk Semua

            </h2>

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div>

                    <img
                        src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900"
                        class="rounded-3xl shadow-lg w-full"
                        alt="Tentang Sudiang Info">

                </div>

                <div class="space-y-6 text-gray-700 leading-8 text-lg">

                    <p>

                        <strong>Sudiang Info</strong> adalah portal berita
                        sekaligus media blog yang bertujuan memberikan
                        informasi yang cepat, akurat, dan terpercaya kepada
                        masyarakat.

                    </p>

                    <p>

                        Kami menghadirkan berbagai informasi mengenai
                        <strong>berita terkini, pendidikan, teknologi,
                        pemerintahan, ekonomi, olahraga, budaya,
                        hingga kegiatan masyarakat</strong>
                        dalam satu platform yang mudah diakses.

                    </p>

                    <p>

                        Selain berita harian, Sudiang Info juga menyediakan
                        <strong>artikel blog</strong> yang membahas berbagai
                        topik edukatif, tutorial, opini, dan informasi
                        menarik yang dapat menambah wawasan pembaca.

                    </p>

                    <p>

                        Seluruh konten yang diterbitkan melewati proses
                        penyuntingan sehingga informasi yang diterima
                        pembaca tetap berkualitas dan dapat dipercaya.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Blog & Berita -->
<section class="py-20 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold">

                Apa yang Kami Sajikan?

            </h2>

            <p class="text-gray-500 mt-4">

                Sudiang Info tidak hanya menghadirkan berita,
                tetapi juga artikel blog yang bermanfaat.

            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="bg-white rounded-2xl shadow p-8">

                <div class="text-5xl mb-5">
                    📰
                </div>

                <h3 class="font-bold text-xl mb-3">

                    Berita Terbaru

                </h3>

                <p class="text-gray-600">

                    Informasi nasional maupun daerah yang selalu diperbarui.

                </p>

            </div>

            <div class="bg-white rounded-2xl shadow p-8">

                <div class="text-5xl mb-5">
                    ✍️
                </div>

                <h3 class="font-bold text-xl mb-3">

                    Blog

                </h3>

                <p class="text-gray-600">

                    Artikel, tutorial, opini, dan informasi menarik yang
                    memberikan wawasan baru.

                </p>

            </div>

            <div class="bg-white rounded-2xl shadow p-8">

                <div class="text-5xl mb-5">
                    📂
                </div>

                <h3 class="font-bold text-xl mb-3">

                    Kategori

                </h3>

                <p class="text-gray-600">

                    Semua artikel dikelompokkan berdasarkan kategori agar
                    mudah ditemukan.

                </p>

            </div>

            <div class="bg-white rounded-2xl shadow p-8">

                <div class="text-5xl mb-5">
                    🌐
                </div>

                <h3 class="font-bold text-xl mb-3">

                    Informasi Publik

                </h3>

                <p class="text-gray-600">

                    Menjadi media informasi yang bermanfaat bagi masyarakat.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- Visi & Misi -->
<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-10">

            <div class="bg-blue-600 rounded-3xl p-10 text-white">

                <h3 class="text-3xl font-bold mb-5">

                    Visi

                </h3>

                <p class="leading-8">

                    Menjadi portal berita dan blog terpercaya yang
                    memberikan informasi berkualitas bagi masyarakat
                    Indonesia.

                </p>

            </div>

            <div class="bg-gray-100 rounded-3xl p-10">

                <h3 class="text-3xl font-bold mb-5">

                    Misi

                </h3>

                <ul class="space-y-4 text-gray-700">

                    <li>✔ Menyajikan berita yang akurat dan terpercaya.</li>

                    <li>✔ Memberikan artikel blog yang edukatif.</li>

                    <li>✔ Mendukung penyebaran informasi positif.</li>

                    <li>✔ Menjadi media informasi masyarakat.</li>

                </ul>

            </div>

        </div>

    </div>

</section>

@endsection