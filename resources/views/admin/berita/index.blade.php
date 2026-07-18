@extends('layouts.admin')

@section('title','Data Berita')


@section('content')


{{-- HEADER --}}

<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">


    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Data Berita
        </h1>


        <p class="text-gray-500 mt-2">
            Kelola seluruh berita website Sudiang Info.
        </p>


    </div>




    <a href="{{ route('admin.berita.create') }}"
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


        📰 Tambah Berita


    </a>



</div>







{{-- ALERT --}}

@if(session('success'))


<div class="mb-6 flex items-center gap-3

bg-green-100

border border-green-300

text-green-700

px-5 py-4

rounded-xl">


    ✅

    <span>

        {{ session('success') }}

    </span>


</div>


@endif







{{-- CARD CONTAINER --}}

<div class="bg-white rounded-3xl shadow-xl overflow-hidden">







{{-- ================= DESKTOP TABLE ================= --}}


<div class="hidden md:block overflow-x-auto">



<table class="w-full">



<thead class="bg-gray-100">


<tr>


<th class="px-6 py-4 text-left text-gray-700">
No
</th>


<th class="px-6 py-4 text-left text-gray-700">
Gambar
</th>


<th class="px-6 py-4 text-left text-gray-700">
Judul
</th>


<th class="px-6 py-4 text-left text-gray-700">
Kategori
</th>


<th class="px-6 py-4 text-left text-gray-700">
Penulis
</th>


<th class="px-6 py-4 text-left text-gray-700">
Status
</th>


<th class="px-6 py-4 text-center text-gray-700">
Aksi
</th>


</tr>


</thead>






<tbody class="divide-y">



@forelse($beritas as $item)



<tr class="hover:bg-gray-50 transition duration-300">





<td class="px-6 py-4 font-medium">


{{ $loop->iteration }}


</td>







<td class="px-6 py-4">


@if($item->gambar)


<img
src="{{ asset('storage/'.$item->gambar) }}"

class="w-24 h-16

object-cover

rounded-xl

shadow

hover:scale-105

transition duration-300">


@else


<div class="w-24 h-16

bg-gray-200

rounded-xl

flex items-center justify-center

text-gray-400 text-sm">


No Image


</div>


@endif



</td>









<td class="px-6 py-4">



<h3 class="font-semibold text-gray-800 max-w-xs">


{{ Str::limit($item->judul,45) }}


</h3>



<p class="text-xs text-gray-400 mt-1">


📅 {{ $item->created_at->format('d M Y') }}


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

{{ $item->kategori->nama ?? '-' }}


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


{{ strtoupper(substr($item->user->name ?? 'U',0,1)) }}


</div>



<div>


<p class="font-medium text-gray-800">

{{ $item->user->name ?? '-' }}

</p>


<p class="text-xs text-gray-400">

Penulis

</p>


</div>


</div>


</td>









<td class="px-6 py-4">



@if($item->status == 'publish')


<span class="px-3 py-1 rounded-full

bg-green-100

text-green-700

text-sm">


✅ Publish


</span>



@else


<span class="px-3 py-1 rounded-full

bg-yellow-100

text-yellow-700

text-sm">


📝 Draft


</span>



@endif



</td>









<td class="px-6 py-4">



<div class="flex justify-center gap-2">





<a href="{{ route('admin.berita.show',$item) }}"

class="px-3 py-2 rounded-lg

bg-gray-100

text-gray-700

hover:bg-gray-700

hover:text-white

transition">


👁


</a>








<a href="{{ route('admin.berita.edit',$item) }}"

class="px-3 py-2 rounded-lg

bg-blue-100

text-blue-700

hover:bg-blue-600

hover:text-white

transition">


✏


</a>







<form

action="{{ route('admin.berita.destroy',$item) }}"

method="POST">


@csrf

@method('DELETE')



<button

onclick="return confirm('Yakin hapus berita ini?')"

class="px-3 py-2 rounded-lg

bg-red-100

text-red-700

hover:bg-red-600

hover:text-white

transition">


🗑


</button>



</form>




</div>



</td>





</tr>





@empty



<tr>


<td colspan="7"

class="text-center py-12 text-gray-400">


📰

<br>

Belum ada berita.


</td>


</tr>



@endforelse




</tbody>


</table>



</div>









{{-- ================= MOBILE CARD ================= --}}



<div class="md:hidden p-5 space-y-5">



@forelse($beritas as $item)



<div class="bg-gray-50 rounded-2xl p-5

shadow-sm

hover:shadow-lg

transition">





@if($item->gambar)


<img

src="{{ asset('storage/'.$item->gambar) }}"

class="w-full h-48

object-cover

rounded-xl

mb-4">


@endif






<h2 class="font-bold text-xl text-gray-800">


{{ $item->judul }}


</h2>







<div class="mt-4 space-y-2 text-sm text-gray-600">



<p>

📂 {{ $item->kategori->nama ?? '-' }}

</p>


<p>

👤 {{ $item->user->name ?? '-' }}

</p>


<p>

📅 {{ $item->created_at->format('d M Y') }}

</p>




<p>


@if($item->status=='publish')


<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

✅ Publish

</span>


@else


<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

📝 Draft

</span>


@endif


</p>


</div>









<div class="grid grid-cols-3 gap-2 mt-5">



<a href="{{ route('admin.berita.show',$item) }}"

class="text-center py-2 rounded-lg

bg-gray-700

text-white

hover:bg-gray-800">


👁


</a>





<a href="{{ route('admin.berita.edit',$item) }}"

class="text-center py-2 rounded-lg

bg-blue-600

text-white

hover:bg-blue-700">


✏


</a>





<form

action="{{ route('admin.berita.destroy',$item) }}"

method="POST">


@csrf

@method('DELETE')



<button

onclick="return confirm('Hapus berita?')"

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

Belum ada berita.


</div>


@endforelse



</div>





</div>






{{-- PAGINATION --}}


<div class="mt-6">


{{ $beritas->links() }}


</div>



@endsection