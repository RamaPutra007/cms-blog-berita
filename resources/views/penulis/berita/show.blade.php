@extends('layouts.penulis')


@section('title', 'Detail Berita')



@section('content')


    <div class="max-w-6xl mx-auto space-y-6">





        {{-- CARD UTAMA --}}
        <div class="
        bg-white
        rounded-3xl
        shadow-xl
        overflow-hidden
    ">





            {{-- GAMBAR BERITA --}}
            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                    class="
                w-full
                h-64
                sm:h-80
                md:h-96
                object-cover
                ">
            @else
                <div
                    class="
                h-64
                sm:h-80
                md:h-96
                bg-gray-100
                flex
                items-center
                justify-center
                text-gray-400
                text-lg
                ">

                    Tidak ada gambar


                </div>
            @endif










            {{-- CONTENT --}}
            <div class="
            p-5
            sm:p-8
            md:p-10
        ">





                {{-- BADGE --}}
                <div
                    class="
                flex
                flex-wrap
                gap-3
                mb-6
            ">




                    {{-- KATEGORI --}}
                    <span
                        class="
                    px-4
                    py-2
                    rounded-full
                    bg-blue-100
                    text-blue-700
                    text-sm
                    font-semibold
                    ">

                        📂
                        {{ optional($berita->kategori)->nama ?? 'Tanpa Kategori' }}

                    </span>







                    {{-- STATUS --}}
                    @if ($berita->status == 'publish')
                        <span
                            class="
                        px-4
                        py-2
                        rounded-full
                        bg-green-100
                        text-green-700
                        text-sm
                        font-semibold
                        ">

                            ✅ Publish

                        </span>
                    @else
                        <span
                            class="
                        px-4
                        py-2
                        rounded-full
                        bg-yellow-100
                        text-yellow-700
                        text-sm
                        font-semibold
                        ">

                            📝 Draft

                        </span>
                    @endif





                </div>









                {{-- JUDUL --}}
                <h1
                    class="
                text-2xl
                sm:text-3xl
                md:text-4xl
                font-bold
                text-gray-800
                leading-tight
                ">

                    {{ $berita->judul }}


                </h1>









                {{-- INFO --}}
                <div
                    class="
                mt-5
                flex
                flex-col
                sm:flex-row
                gap-3
                sm:gap-6
                text-sm
                text-gray-500
                ">


                    <span>

                        📅

                        {{ $berita->created_at ? $berita->created_at->format('d M Y H:i') : '-' }}

                    </span>




                    <span>

                        👤
                        {{ optional($berita->user)->name ?? '-' }}

                    </span>


                </div>







                <hr class="my-8">







                {{-- ISI BERITA --}}
                <div
                    class="
                text-gray-700
                leading-8
                text-base
                sm:text-lg
                whitespace-pre-line
                ">

                    {!! nl2br(e($berita->isi)) !!}


                </div>






            </div>



        </div>













        {{-- BUTTON --}}
        <div class="
        flex
        flex-col
        sm:flex-row
        gap-3
        ">





            {{-- EDIT --}}
            <a href="{{ route('penulis.berita.edit', $berita) }}"
                class="
            w-full
            sm:w-auto
            text-center
            px-6
            py-3
            rounded-xl
            bg-yellow-500
            hover:bg-yellow-600
            text-white
            font-semibold
            shadow-lg
            transition
            ">

                ✏ Edit


            </a>









            {{-- KEMBALI --}}
            <a href="{{ route('penulis.berita.index') }}"
                class="
            w-full
            sm:w-auto
            text-center
            px-6
            py-3
            rounded-xl
            bg-gray-600
            hover:bg-gray-700
            text-white
            font-semibold
            shadow-lg
            transition
            ">

                ← Kembali


            </a>









            {{-- DELETE --}}
            <form action="{{ route('penulis.berita.destroy', $berita) }}" method="POST" class="w-full sm:w-auto">

                @csrf

                @method('DELETE')



                <button onclick="return confirm('Yakin ingin menghapus berita ini?')"
                    class="
                w-full
                px-6
                py-3
                rounded-xl
                bg-red-600
                hover:bg-red-700
                text-white
                font-semibold
                shadow-lg
                transition
                ">

                    🗑 Hapus


                </button>



            </form>






        </div>





    </div>



@endsection
