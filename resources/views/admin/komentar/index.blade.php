@extends('layouts.admin')

@section('title', 'Data Komentar')

@section('content')

    <div class="max-w-7xl mx-auto space-y-8">


        {{-- HEADER --}}
        <div class="
bg-gradient-to-r
from-blue-600
to-indigo-700
rounded-3xl
p-8
text-white
shadow-xl
">

            <h1 class="text-3xl font-bold">
                💬 Data Komentar
            </h1>

            <p class="mt-2 text-blue-100">
                Kelola komentar pembaca dan balasan admin.
            </p>

        </div>



        {{-- ALERT --}}
        @if (session('success'))
            <div class="
bg-green-100
text-green-700
p-4
rounded-xl
">

                {{ session('success') }}

            </div>
        @endif





        @forelse($komentars as $komentar)


            <div class="
bg-white
rounded-3xl
shadow-lg
p-6
">


                <div class="flex gap-4">


                    {{-- AVATAR KOMENTAR --}}

                    <div
                        class="
w-12
h-12
rounded-full
bg-blue-600
text-white
flex
items-center
justify-center
font-bold
text-lg
">


                        {{ strtoupper(substr($komentar->nama ?? 'U', 0, 1)) }}


                    </div>



                    <div class="flex-1">


                        {{-- HEADER KOMENTAR --}}

                        <div class="
flex
flex-col
md:flex-row
md:justify-between
gap-3
">


                            <div>


                                <h3 class="font-bold text-gray-800 text-lg">

                                    {{ $komentar->nama ?? 'Pengunjung' }}

                                </h3>


                                <p class="text-sm text-gray-400">

                                    {{ optional($komentar->created_at)->format('d M Y H:i') }}

                                </p>


                            </div>




                            {{-- HAPUS KOMENTAR --}}

                            <form action="{{ route('admin.komentar.destroy', $komentar) }}" method="POST"
                                onsubmit="return confirm('Hapus komentar ini?')">


                                @csrf

                                @method('DELETE')


                                <button
                                    class="
px-4
py-2
rounded-xl
bg-red-100
text-red-700
hover:bg-red-600
hover:text-white
">


                                    🗑 Hapus


                                </button>


                            </form>



                        </div>







                        {{-- ISI KOMENTAR --}}

                        <div class="
mt-5
bg-gray-50
border
rounded-2xl
p-5
">


                            <p class="text-gray-700">

                                {{ $komentar->isi }}

                            </p>


                        </div>






                        {{-- ARTIKEL --}}

                        <div class="mt-4">


                            <span class="
inline-flex
px-4
py-2
rounded-full
bg-blue-100
text-blue-700
text-sm
">


                                📄 {{ $komentar->artikel->judul ?? '-' }}


                            </span>


                        </div>







                        {{-- BALAS ADMIN --}}

                        <form action="{{ route('admin.komentar.reply', $komentar) }}" method="POST" class="mt-6">


                            @csrf


                            <div class="
flex
flex-col
md:flex-row
gap-3
">


                                <input type="text" name="isi" required placeholder="Tulis balasan admin..."
                                    class="
flex-1
border
rounded-xl
px-4
py-3
focus:ring-2
focus:ring-blue-300
">


                                <button class="
px-6
py-3
bg-blue-600
text-white
rounded-xl
hover:bg-blue-700
">


                                    💬 Balas


                                </button>


                            </div>


                        </form>








                        {{-- BALASAN --}}

                        @if ($komentar->replies->count())
                            <div class="
mt-8
ml-2
md:ml-10
border-l-4
border-blue-200
pl-5
space-y-4
">


                                @foreach ($komentar->replies as $reply)
                                    <div class="
bg-blue-50
rounded-2xl
p-5
">


                                        <div class="
flex
justify-between
gap-3
">


                                            <div class="flex gap-3">



                                                {{-- AVATAR REPLY --}}

                                                <div
                                                    class="
w-10
h-10
rounded-full
bg-blue-600
text-white
flex
items-center
justify-center
font-bold
">


                                                    {{ strtoupper(substr($reply->nama ?? 'A', 0, 1)) }}


                                                </div>





                                                <div>


                                                    <h4 class="font-semibold">

                                                        {{ $reply->nama ?? 'Admin' }}

                                                    </h4>



                                                    <p class="
text-gray-700
mt-2
">

                                                        {{ $reply->isi }}

                                                    </p>



                                                    <p class="
text-xs
text-gray-400
mt-2
">

                                                        {{ optional($reply->created_at)->format('d M Y H:i') }}

                                                    </p>



                                                </div>


                                            </div>






                                            {{-- HAPUS REPLY --}}

                                            <form action="{{ route('admin.komentar.reply.destroy', $reply) }}"
                                                method="POST" onsubmit="return confirm('Hapus balasan?')">


                                                @csrf

                                                @method('DELETE')



                                                <button class="
text-red-600
hover:text-red-800
">


                                                    🗑


                                                </button>


                                            </form>



                                        </div>


                                    </div>
                                @endforeach


                            </div>
                        @endif







                    </div>


                </div>


            </div>




        @empty


            <div class="
bg-white
rounded-3xl
p-12
text-center
text-gray-400
">


                💬

                <p class="mt-3">

                    Belum ada komentar

                </p>


            </div>


        @endforelse






        {{-- PAGINATION --}}

        <div>

            {{ $komentars->links() }}

        </div>



    </div>


@endsection
