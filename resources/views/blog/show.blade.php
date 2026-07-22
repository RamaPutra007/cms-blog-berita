@extends('layouts.public')


@section('title', $artikel->judul)



@section('content')


    <section class="bg-gray-50 py-12 md:py-20">


        <div class="max-w-5xl mx-auto px-4 sm:px-6">





            {{-- ================= ARTIKEL ================= --}}


            <article class="
bg-white
rounded-3xl
shadow-xl
overflow-hidden
">

                {{-- GAMBAR --}}

                @if ($artikel->gambar)
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                        class="
w-full
h-64
md:h-[450px]
object-cover
">
                @else
                    <div class="
h-64
bg-gray-200
flex
items-center
justify-center
text-gray-400
">

                        Tidak ada gambar


                    </div>
                @endif








                <div class="p-6 md:p-12">






                    {{-- KATEGORI --}}


                    @if ($artikel->kategori)
                        <a href="{{ route('kategori.show', $artikel->kategori->slug) }}"
                            class="
inline-flex
px-4
py-2
rounded-full
bg-blue-100
text-blue-700
font-semibold
text-sm
">

                            {{ $artikel->kategori->nama }}


                        </a>
                    @endif







                    {{-- JUDUL --}}


                    <h1 class="
mt-6
text-3xl
md:text-5xl
font-black
leading-tight
text-gray-900
">


                        {{ $artikel->judul }}


                    </h1>









                    {{-- PENULIS --}}


                    <div class="
mt-6
flex
items-center
gap-4
text-gray-500
">



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


                            {{ strtoupper(substr($artikel->user->name ?? 'U', 0, 1)) }}


                        </div>




                        <div>


                            <p class="
font-semibold
text-gray-800
">


                                {{ $artikel->user->name ?? 'Penulis' }}


                            </p>



                            <p class="text-sm">


                                Penulis


                            </p>


                        </div>




                        <span>
                            •
                        </span>



                        <p class="text-sm">


                            {{ $artikel->created_at->format('d M Y') }}


                        </p>



                    </div>









                    {{-- ISI ARTIKEL --}}


                    <div class="
mt-10
prose
prose-lg
max-w-none
text-gray-700
leading-8
">


                        {!! nl2br(e($artikel->isi)) !!}


                    </div>





                </div>


            </article>











            {{-- ================= KOMENTAR ================= --}}



            <section class="
mt-12
bg-white
rounded-3xl
shadow-xl
p-6
md:p-10
">





                <h2 class="
text-2xl
md:text-3xl
font-bold
text-gray-900
mb-8
">

                    💬 Komentar Pembaca

                </h2>







                @if (session('success'))
                    <div class="
mb-6
bg-green-100
text-green-700
p-4
rounded-xl
">


                        {{ session('success') }}


                    </div>
                @endif







                {{-- FORM KOMENTAR --}}



                <form action="{{ route('blog.komentar', $artikel->slug) }}" method="POST" class="space-y-5">


                    @csrf



                    <input type="text" name="nama" placeholder="Nama Anda" required
                        class="
w-full
border
rounded-xl
px-5
py-3
focus:ring-2
focus:ring-blue-500
">



                    <input type="email" name="email" placeholder="Email Anda" required
                        class="
w-full
border
rounded-xl
px-5
py-3
focus:ring-2
focus:ring-blue-500
">




                    <textarea name="isi" rows="5" required placeholder="Tulis komentar..."
                        class="
w-full
border
rounded-xl
px-5
py-3
focus:ring-2
focus:ring-blue-500
"></textarea>





                    <button
                        class="
bg-blue-600
hover:bg-blue-700
text-white
px-8
py-3
rounded-xl
font-semibold
transition
">


                        Kirim Komentar


                    </button>



                </form>









                {{-- LIST KOMENTAR --}}


                <div class="
mt-12
space-y-8
">





                    @forelse(
    $artikel->komentars->where('parent_id',null)
    as $komentar
    )





                        <div class="
border-b
pb-8
">



                            <div class="
flex
gap-4
">






                                {{-- AVATAR KOMENTAR --}}


                                <div
                                    class="
w-12
h-12
shrink-0
rounded-full
bg-blue-600
text-white
flex
items-center
justify-center
font-bold
">

                                    {{ strtoupper(substr($komentar->nama ?? 'U', 0, 1)) }}


                                </div>






                                <div class="flex-1">





                                    <h3 class="
font-bold
text-gray-800
text-lg
">


                                        {{ $komentar->nama ?? 'Pengunjung' }}


                                    </h3>




                                    <p class="
text-xs
text-gray-400
">

                                        {{ $komentar->created_at->diffForHumans() }}


                                    </p>







                                    <p class="
mt-3
text-gray-700
">

                                        {{ $komentar->isi }}


                                    </p>









                                    {{-- BALASAN --}}


                                    @if ($komentar->replies->count())
                                        <div class="
mt-6
ml-5
border-l-4
border-blue-200
pl-5
space-y-4
">






                                            @foreach ($komentar->replies as $reply)
                                                <div class="
bg-gray-50
rounded-xl
p-5
">





                                                    <div class="
flex
items-center
gap-3
">





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
text-sm
">


                                                            {{ strtoupper(substr($reply->user->name ?? ($reply->nama ?? 'U'), 0, 1)) }}



                                                        </div>

                                                        <div>



                                                            <h4 class="
font-bold
text-gray-800
">


                                                                {{ $reply->user->name ?? ($reply->nama ?? 'Pengelola') }}



                                                            </h4>




                                                            <p class="
text-xs
text-gray-400
">

                                                                {{ $reply->created_at->diffForHumans() }}


                                                            </p>


                                                        </div>



                                                    </div>







                                                    <p class="
mt-4
text-gray-700
">


                                                        {{ $reply->isi }}


                                                    </p>





                                                </div>
                                            @endforeach




                                        </div>
                                    @endif






                                </div>



                            </div>



                        </div>







                    @empty



                        <div class="
text-center
py-10
text-gray-400
">


                            <div class="text-5xl">
                                💬
                            </div>


                            <p class="mt-3">
                                Belum ada komentar
                            </p>


                        </div>



                    @endforelse





                </div>






            </section>









            {{-- BACK --}}


            <div class="mt-10">


                <a href="{{ route('blog.index') }}"
                    class="
inline-flex
px-6
py-3
bg-gray-900
text-white
rounded-xl
hover:bg-gray-700
transition
">


                    ← Kembali ke Blog


                </a>


            </div>





        </div>


    </section>


@endsection
