@extends('layouts.penulis')

@section('title', 'Berita Saya')


@section('content')

    <div class="max-w-7xl mx-auto space-y-6">


        {{-- HEADER --}}
        <div class="
bg-gradient-to-r
from-blue-600
to-indigo-700
rounded-3xl
p-6
sm:p-8
text-white
shadow-xl
">


            <div class="
flex
flex-col
md:flex-row
md:items-center
md:justify-between
gap-5
">


                <div>

                    <h1 class="text-3xl font-bold">
                        📰 Berita Saya
                    </h1>

                    <p class="text-blue-100 mt-2">
                        Kelola berita yang kamu buat
                    </p>

                </div>



                <a href="{{ route('penulis.berita.create') }}"
                    class="
px-6 py-3
rounded-xl
bg-white
text-blue-700
font-semibold
text-center
shadow
hover:bg-gray-100
">

                    ➕ Tambah Berita

                </a>


            </div>

        </div>






        @if (session('success'))
            <div class="
bg-green-100
text-green-700
border
border-green-300
p-4
rounded-xl
">

                {{ session('success') }}

            </div>
        @endif







        {{-- SEARCH --}}

        <div class="bg-white rounded-3xl shadow p-5">


            <form>

                <div class="flex flex-col sm:flex-row gap-3">


                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..."
                        class="
w-full
rounded-xl
border-gray-300
px-4
py-3
">


                    <button class="
px-6
py-3
rounded-xl
bg-blue-600
text-white
">

                        🔍 Cari

                    </button>


                </div>


            </form>


        </div>








        {{-- LIST --}}

        <div class="
grid
grid-cols-1
md:grid-cols-2
xl:grid-cols-3
gap-6
">



            @forelse($berita as $item)
                <div class="
bg-white
rounded-3xl
shadow-lg
overflow-hidden
hover:shadow-2xl
transition
">



                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="
w-full
h-52
object-cover
">
                    @else
                        <div class="
h-52
bg-gray-100
flex
items-center
justify-center
text-gray-400
">

                            Tidak ada gambar

                        </div>
                    @endif





                    <div class="p-5">



                        <div class="flex flex-wrap gap-2 mb-3">


                            @if ($item->status == 'publish')
                                <span class="
px-3 py-1
rounded-full
bg-green-100
text-green-700
text-xs
">

                                    Publish

                                </span>
                            @else
                                <span class="
px-3 py-1
rounded-full
bg-yellow-100
text-yellow-700
text-xs
">

                                    Draft

                                </span>
                            @endif



                            <span class="
px-3 py-1
rounded-full
bg-blue-100
text-blue-700
text-xs
">

                                {{ $item->kategori->nama ?? '-' }}

                            </span>


                        </div>




                        <h2 class="
text-xl
font-bold
text-gray-800
">

                            {{ $item->judul }}

                        </h2>



                        <p class="
text-gray-500
mt-3
line-clamp-3
">

                            {{ Str::limit($item->isi, 120) }}

                        </p>




                        <div class="
flex
flex-wrap
gap-2
mt-5
">


                            <a href="{{ route('penulis.berita.show', $item) }}"
                                class="
px-4 py-2
rounded-xl
bg-blue-600
text-white
text-sm
">

                                Detail

                            </a>



                            <a href="{{ route('penulis.berita.edit', $item) }}"
                                class="
px-4 py-2
rounded-xl
bg-yellow-500
text-white
text-sm
">

                                Edit

                            </a>




                            <form action="{{ route('penulis.berita.destroy', $item) }}" method="POST"
                                onsubmit="return confirm('Hapus berita?')">

                                @csrf
                                @method('DELETE')


                                <button class="
px-4 py-2
rounded-xl
bg-red-600
text-white
text-sm
">

                                    Hapus

                                </button>


                            </form>



                        </div>



                    </div>


                </div>



            @empty


                <div class="
col-span-full
bg-white
rounded-3xl
p-10
text-center
">

                    Belum ada berita


                </div>
            @endforelse


        </div>



        <div>

            {{ $berita->links() }}

        </div>



    </div>

@endsection
