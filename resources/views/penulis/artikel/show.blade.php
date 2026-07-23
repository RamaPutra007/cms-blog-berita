@extends('layouts.penulis')

@section('title', 'Detail Artikel')


@section('content')


    <div class="w-full max-w-6xl mx-auto">



        <div class="
        bg-white
        rounded-3xl
        shadow-xl
        overflow-hidden
    ">



            {{-- GAMBAR --}}
            @if ($artikel->gambar)
                <img src="{{ asset('storage/' . $artikel->gambar) }}"
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








            <div class="
            p-5
            sm:p-8
        ">




                {{-- INFO --}}
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

                        📂 {{ $artikel->kategori->nama ?? '-' }}

                    </span>






                    {{-- PENULIS --}}
                    <span
                        class="
                    px-4
                    py-2
                    rounded-full
                    bg-purple-100
                    text-purple-700
                    text-sm
                    font-semibold
                ">


                        👤 {{ $artikel->user->name ?? '-' }}


                    </span>








                    {{-- STATUS --}}
                    @if ($artikel->status == 'publish')
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
                mb-5
                leading-tight
            ">


                    {{ $artikel->judul }}


                </h1>









                {{-- TANGGAL --}}
                <div
                    class="
                flex
                flex-col
                sm:flex-row
                gap-3
                sm:gap-6
                text-sm
                text-gray-500
                mb-6
            ">


                    <span>

                        📅 Dibuat:
                        {{ $artikel->created_at->format('d M Y H:i') }}

                    </span>



                    <span>

                        🔄 Update:
                        {{ $artikel->updated_at->format('d M Y H:i') }}

                    </span>



                </div>






                <hr class="mb-6">







                {{-- ISI --}}
                <div
                    class="
                text-gray-700
                leading-8
                text-base
                sm:text-lg
                whitespace-pre-line
            ">


                    {!! nl2br(e($artikel->isi)) !!}


                </div>





            </div>



        </div>












        {{-- BUTTON --}}
        <div class="
        mt-8
        flex
        flex-col
        sm:flex-row
        gap-3
    ">



            {{-- EDIT --}}
            <a href="{{ route('penulis.artikel.edit', $artikel) }}"
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
            <a href="{{ route('penulis.artikel.index') }}"
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








            {{-- HAPUS --}}
            <form action="{{ route('penulis.artikel.destroy', $artikel) }}" method="POST"
                onsubmit="return confirm('Hapus artikel ini?')" class="w-full sm:w-auto">

                @csrf
                @method('DELETE')



                <button
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
