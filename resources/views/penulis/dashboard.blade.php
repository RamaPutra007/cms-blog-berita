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

                        Selamat Datang {{ auth()->user()->name }}

                    </h1>


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

    </div>

@endsection
