@extends('layouts.admin')


@section('title', 'Detail Berita')



@section('content')



    <div class="max-w-7xl mx-auto space-y-8">





        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">



            <div>

                <h1 class="text-3xl md:text-4xl font-black text-gray-900">

                    Detail Berita

                </h1>


                <p class="mt-2 text-gray-500">

                    Informasi lengkap berita website CMS.

                </p>


            </div>






            {{-- BUTTON BACK --}}

            <a href="{{ route('admin.berita.index') }}"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-2xl bg-gray-900 text-white font-semibold shadow-lg hover:bg-gray-700 hover:-translate-y-1 transition duration-300">


                ← Kembali Berita


            </a>




        </div>









        {{-- MAIN CARD --}}

        <article class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">







            {{-- IMAGE HERO --}}

            @if ($berita->gambar)



                <div class="relative overflow-hidden group">



                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                        class="w-full h-72 sm:h-96 md:h-[520px] object-cover transition duration-700 group-hover:scale-110">






                    {{-- OVERLAY --}}

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>








                    {{-- TITLE IMAGE --}}

                    <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8 md:p-12 text-white">






                        <div class="flex flex-wrap gap-3 mb-5">





                            {{-- KATEGORI --}}

                            <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-md text-sm font-semibold">


                                📂

                                {{ optional($berita->kategori)->nama ?? 'Tanpa Kategori' }}


                            </span>









                            {{-- STATUS --}}

                            @if ($berita->status == 'publish')
                                <span class="px-4 py-2 rounded-full bg-green-500/80 backdrop-blur-md text-sm font-semibold">


                                    ✅ Publish


                                </span>
                            @else
                                <span
                                    class="px-4 py-2 rounded-full bg-yellow-500/80 backdrop-blur-md text-sm font-semibold">


                                    📝 Draft


                                </span>
                            @endif





                        </div>










                        <h1 class="text-2xl sm:text-3xl md:text-5xl font-black leading-tight">


                            {{ $berita->judul }}


                        </h1>






                    </div>



                </div>
            @else
                <div class="h-72 md:h-[520px] bg-gray-100 flex items-center justify-center text-gray-400 text-xl">


                    📰 Tidak ada gambar


                </div>






            @endif














            {{-- DETAIL CONTENT --}}

            <div class="p-6 sm:p-8 md:p-12">







                {{-- INFORMATION --}}

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">





                    <div class="flex items-center gap-3 bg-gray-50 rounded-2xl px-5 py-4">

                        <span class="text-2xl">

                            📅

                        </span>


                        <div>

                            <p class="text-xs text-gray-400">

                                Dibuat

                            </p>


                            <p class="font-semibold text-gray-700">


                                {{ $berita->created_at->format('d M Y H:i') }}


                            </p>


                        </div>


                    </div>








                    <div class="flex items-center gap-3 bg-gray-50 rounded-2xl px-5 py-4">


                        <span class="text-2xl">

                            👤

                        </span>



                        <div>

                            <p class="text-xs text-gray-400">

                                Penulis

                            </p>



                            <p class="font-semibold text-gray-700">


                                {{ optional($berita->user)->name ?? '-' }}


                            </p>



                        </div>


                    </div>










                    <div class="flex items-center gap-3 bg-gray-50 rounded-2xl px-5 py-4">


                        <span class="text-2xl">

                            🔄

                        </span>


                        <div>

                            <p class="text-xs text-gray-400">

                                Update

                            </p>


                            <p class="font-semibold text-gray-700">


                                {{ $berita->updated_at->format('d M Y H:i') }}


                            </p>


                        </div>


                    </div>






                </div>







                <hr class="mb-8">







                {{-- ARTICLE CONTENT --}}


                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">


                    {!! nl2br(e($berita->isi)) !!}


                </div>







            </div>






        </article>












        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <a href="{{ route('admin.berita.edit', $berita) }}"
                class="flex items-center justify-center gap-2 px-6 py-4 rounded-2xl bg-gradient-to-r from-indigo-500 to-blue-600 text-white font-semibold shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                ✏️ Edit Berita

            </a>


            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-6 py-4 rounded-2xl bg-gradient-to-r from-rose-500 to-red-600 text-white font-semibold shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    🗑️ Hapus Berita

                </button>

            </form>

        </div>

    </div>

@endsection
