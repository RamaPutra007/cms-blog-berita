@extends('layouts.admin')

@section('title','Data Artikel')


@section('content')



{{-- HEADER --}}

<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">


    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Data Artikel
        </h1>


        <p class="text-gray-500 mt-2">
            Kelola semua artikel blog Sudiang Info.
        </p>


    </div>





    <a href="{{ route('admin.artikel.create') }}"

    class="inline-flex items-center justify-center gap-2

    bg-blue-600

    hover:bg-blue-700

    text-white

    px-5 py-3

    rounded-xl

    shadow-md

    hover:shadow-xl

    hover:-translate-y-1

    transition duration-300">


        ✚ Tambah Artikel


    </a>



</div>









{{-- DESKTOP TABLE --}}


<div class="bg-white rounded-3xl shadow-xl overflow-hidden">



<div class="hidden md:block overflow-x-auto">



<table class="w-full">



<thead class="bg-gray-100">


<tr>


<th class="px-6 py-4 text-left">
No
</th>


<th class="px-6 py-4 text-left">
Gambar
</th>


<th class="px-6 py-4 text-left">
Judul
</th>


<th class="px-6 py-4 text-left">
Kategori
</th>


<th class="px-6 py-4 text-left">
Penulis
</th>


<th class="px-6 py-4 text-center">
Aksi
</th>


</tr>


</thead>






<tbody class="divide-y">





@forelse($artikels as $artikel)





<tr class="hover:bg-gray-50 transition duration-300">






<td class="px-6 py-4 font-medium">

{{ $loop->iteration }}

</td>








<td class="px-6 py-4">


@if($artikel->gambar)


<img
src="{{ asset('storage/'.$artikel->gambar) }}"

class="w-24 h-16

object-cover

rounded-xl

shadow

hover:scale-105

transition duration-300">


@else


<div class="w-24 h-16

rounded-xl

bg-gray-200

flex items-center justify-center

text-gray-400 text-sm">


No Image


</div>


@endif



</td>








<td class="px-6 py-4">


<h3 class="font-semibold text-gray-800 max-w-xs">

{{ Str::limit($artikel->judul,45) }}

</h3>


<p class="text-xs text-gray-400 mt-1">

📅 {{ $artikel->created_at->format('d M Y') }}

</p>


</td>








<td class="px-6 py-4">


<span class="inline-flex items-center gap-1

px-3 py-1

rounded-full

bg-blue-100

text-blue-700

text-sm">


📂

{{ $artikel->kategori->nama ?? '-' }}


</span>


</td>









<td class="px-6 py-4">


<div class="flex items-center gap-3">



<div class="w-10 h-10

rounded-full

bg-blue-600

text-white

flex items-center justify-center

font-bold">


{{ strtoupper(substr($artikel->user->name ?? 'U',0,1)) }}


</div>





<span class="font-medium">


{{ $artikel->user->name ?? '-' }}


</span>



</div>


</td>









<td class="px-6 py-4">


<div class="flex justify-center gap-2">






{{-- LIHAT --}}

<a href="{{ route('admin.artikel.show',$artikel) }}"

class="px-3 py-2 rounded-lg

bg-green-100

text-green-700

hover:bg-green-600

hover:text-white

transition"

title="Lihat">


👁


</a>







{{-- EDIT --}}

<a href="{{ route('admin.artikel.edit',$artikel) }}"

class="px-3 py-2 rounded-lg

bg-yellow-100

text-yellow-700

hover:bg-yellow-500

hover:text-white

transition"

title="Edit">


✏


</a>









{{-- HAPUS --}}


<form

action="{{ route('admin.artikel.destroy',$artikel) }}"

method="POST">


@csrf

@method('DELETE')



<button

onclick="return confirm('Yakin ingin menghapus artikel ini?')"

class="px-3 py-2 rounded-lg

bg-red-100

text-red-700

hover:bg-red-600

hover:text-white

transition"

title="Hapus">


🗑


</button>



</form>






</div>


</td>




</tr>





@empty




<tr>

<td colspan="6"

class="text-center py-12 text-gray-400">


📰

<br>

Belum ada artikel.


</td>


</tr>




@endforelse






</tbody>


</table>



</div>









{{-- MOBILE CARD --}}


<div class="md:hidden p-5 space-y-5">





@forelse($artikels as $artikel)




<div class="bg-gray-50 rounded-2xl p-5

shadow-sm

hover:shadow-lg

transition">





@if($artikel->gambar)


<img

src="{{ asset('storage/'.$artikel->gambar) }}"

class="w-full h-48

object-cover

rounded-xl

mb-4">


@endif






<h2 class="text-xl font-bold text-gray-800">

{{ $artikel->judul }}

</h2>







<div class="mt-4 space-y-2 text-sm text-gray-600">



<p>

📂 {{ $artikel->kategori->nama ?? '-' }}

</p>


<p>

👤 {{ $artikel->user->name ?? '-' }}

</p>


<p>

📅 {{ $artikel->created_at->format('d M Y') }}

</p>



</div>









<div class="grid grid-cols-3 gap-2 mt-5">





<a href="{{ route('admin.artikel.show',$artikel) }}"

class="text-center py-2 rounded-lg

bg-green-600

text-white

hover:bg-green-700">


👁


</a>






<a href="{{ route('admin.artikel.edit',$artikel) }}"

class="text-center py-2 rounded-lg

bg-yellow-500

text-white

hover:bg-yellow-600">


✏


</a>







<form

action="{{ route('admin.artikel.destroy',$artikel) }}"

method="POST">


@csrf

@method('DELETE')



<button

onclick="return confirm('Hapus artikel?')"

class="w-full py-2 rounded-lg

bg-red-600

text-white

hover:bg-red-700">


🗑


</button>



</form>






</div>






</div>






@empty




<div class="text-center py-10 text-gray-400">


📰

<br>

Belum ada artikel.


</div>




@endforelse






</div>






</div>









<div class="mt-6">

{{ $artikels->links() }}

</div>



@endsection