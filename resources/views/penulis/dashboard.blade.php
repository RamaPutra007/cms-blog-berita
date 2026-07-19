@extends('layouts.penulis')

@section('title', 'Dashboard Penulis')


@section('content')

    <div class="space-y-8">


        {{-- HEADER --}}
        <div
            class="
    bg-gradient-to-r
    from-green-600
    to-emerald-700
    rounded-3xl
    p-6
    sm:p-8
    text-white
    shadow-xl
    ">


            <div
                class="
        flex
        flex-col
        md:flex-row
        md:items-center
        md:justify-between
        gap-5
        ">


                <div>

                    <h1 class="text-3xl sm:text-4xl font-bold">

                        ✍️ Dashboard Penulis

                    </h1>


                    <p class="
                mt-2
                text-green-100
                ">

                        Selamat datang kembali,

                        <span class="font-semibold">

                            {{ auth()->user()->name }}

                        </span>

                    </p>


                </div>




                <div>

                    <span
                        class="
                px-5
                py-2
                rounded-full
                bg-white/20
                backdrop-blur
                font-semibold
                ">

                        ✍ {{ ucfirst(auth()->user()->role) }}

                    </span>


                </div>


            </div>


        </div>









        {{-- STAT CARD --}}

        <div class="
    grid
    grid-cols-1
    sm:grid-cols-2
    xl:grid-cols-4
    gap-6
    ">



            {{-- ARTIKEL --}}

            <div
                class="
        bg-white
        rounded-3xl
        shadow
        border
        border-gray-100
        p-6
        hover:shadow-xl
        transition
        ">


                <div class="flex justify-between">


                    <div>

                        <p class="text-gray-500 text-sm">
                            Artikel Saya
                        </p>


                        <h2
                            class="
                    text-4xl
                    font-bold
                    text-blue-600
                    mt-3
                    ">

                            {{ $artikel }}

                        </h2>


                    </div>


                    <div
                        class="
                w-14
                h-14
                rounded-2xl
                bg-blue-100
                flex
                items-center
                justify-center
                text-3xl
                ">

                        📰

                    </div>


                </div>


            </div>








            {{-- BERITA --}}

            <div
                class="
        bg-white
        rounded-3xl
        shadow
        border
        border-gray-100
        p-6
        hover:shadow-xl
        transition
        ">


                <div class="flex justify-between">


                    <div>

                        <p class="text-gray-500 text-sm">
                            Berita Saya
                        </p>


                        <h2
                            class="
                    text-4xl
                    font-bold
                    text-green-600
                    mt-3
                    ">

                            {{ $berita }}

                        </h2>


                    </div>



                    <div
                        class="
                w-14
                h-14
                rounded-2xl
                bg-green-100
                flex
                items-center
                justify-center
                text-3xl
                ">

                        📢

                    </div>


                </div>


            </div>









            {{-- KOMENTAR --}}

            <div
                class="
        bg-white
        rounded-3xl
        shadow
        border
        border-gray-100
        p-6
        hover:shadow-xl
        transition
        ">


                <div class="flex justify-between">


                    <div>

                        <p class="text-gray-500 text-sm">
                            Komentar
                        </p>


                        <h2
                            class="
                    text-4xl
                    font-bold
                    text-purple-600
                    mt-3
                    ">

                            {{ $komentar }}

                        </h2>


                    </div>



                    <div
                        class="
                w-14
                h-14
                rounded-2xl
                bg-purple-100
                flex
                items-center
                justify-center
                text-3xl
                ">

                        💬

                    </div>


                </div>


            </div>










            {{-- STATUS --}}

            <div
                class="
        bg-white
        rounded-3xl
        shadow
        border
        border-gray-100
        p-6
        hover:shadow-xl
        transition
        ">


                <div class="flex justify-between">


                    <div>

                        <p class="text-gray-500 text-sm">
                            Role
                        </p>


                        <h2
                            class="
                    text-2xl
                    font-bold
                    text-orange-600
                    mt-3
                    ">

                            Penulis

                        </h2>


                    </div>



                    <div
                        class="
                w-14
                h-14
                rounded-2xl
                bg-orange-100
                flex
                items-center
                justify-center
                text-3xl
                ">

                        🖊️

                    </div>


                </div>


            </div>



        </div>










        {{-- GRID CONTENT --}}

        <div class="
    grid
    grid-cols-1
    xl:grid-cols-2
    gap-6
    ">





            {{-- ARTIKEL TERBARU --}}

            <div class="
        bg-white
        rounded-3xl
        shadow
        p-6
        ">


                <div class="flex justify-between mb-5">


                    <h2 class="text-xl font-bold text-gray-800">

                        📰 Artikel Terbaru

                    </h2>


                    <a href="{{ route('penulis.artikel.index') }}" class="text-blue-600 text-sm hover:underline">

                        Lihat Semua

                    </a>


                </div>





                <div class="space-y-4">


                    @forelse($artikelTerbaru as $item)
                        <div class="
                    border-b
                    pb-4
                    ">


                            <h3 class="font-semibold text-gray-800">

                                {{ $item->judul }}

                            </h3>


                            <p class="text-sm text-gray-400">

                                {{ $item->created_at->format('d M Y') }}

                            </p>


                        </div>


                    @empty


                        <p class="text-center text-gray-400 py-8">

                            Belum ada artikel

                        </p>
                    @endforelse


                </div>


            </div>









            {{-- KOMENTAR TERBARU --}}

            <div class="
        bg-white
        rounded-3xl
        shadow
        p-6
        ">


                <div class="flex justify-between mb-5">


                    <h2 class="text-xl font-bold text-gray-800">

                        💬 Komentar Terbaru

                    </h2>


                    <a href="{{ route('penulis.komentar.index') }}" class="text-blue-600 text-sm">

                        Lihat Semua

                    </a>


                </div>





                <div class="space-y-4">


                    @forelse($komentarTerbaru as $item)
                        <div class="border-b pb-4">


                            <h3 class="font-semibold">

                                {{ $item->user->name ?? '-' }}

                            </h3>


                            <p class="text-gray-500 text-sm">

                                {{ $item->isi }}

                            </p>


                        </div>


                    @empty


                        <p class="text-center text-gray-400 py-8">

                            Belum ada komentar

                        </p>
                    @endforelse


                </div>


            </div>




        </div>





        {{-- QUICK ACTION --}}

        <div class="
    bg-white
    rounded-3xl
    shadow
    p-6
    ">


            <h2 class="text-xl font-bold mb-5">

                ⚡ Menu Cepat

            </h2>


            <div class="
        grid
        grid-cols-1
        sm:grid-cols-3
        gap-4
        ">


                <a href="{{ route('penulis.artikel.create') }}"
                    class="
            p-5
            rounded-2xl
            bg-blue-50
            hover:bg-blue-100
            ">

                    ➕ Tambah Artikel

                </a>




                <a href="{{ route('penulis.berita.create') }}"
                    class="
            p-5
            rounded-2xl
            bg-green-50
            hover:bg-green-100
            ">

                    ➕ Tambah Berita

                </a>





                <a href="{{ route('penulis.komentar.index') }}"
                    class="
            p-5
            rounded-2xl
            bg-purple-50
            hover:bg-purple-100
            ">

                    💬 Balas Komentar

                </a>


            </div>


        </div>





    </div>


@endsection
