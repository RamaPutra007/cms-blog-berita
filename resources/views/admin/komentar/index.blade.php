@extends('layouts.admin')

@section('title','Data Komentar')


@section('content')


<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">


    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            💬 Data Komentar
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola komentar pembaca dan balasan admin.
        </p>

    </div>


</div>





@if(session('success'))

<div class="
mb-6
flex items-center gap-3
bg-green-100
border border-green-300
text-green-700
px-5 py-4
rounded-xl
shadow-sm">

✅

{{ session('success') }}

</div>

@endif







<div class="space-y-6">





@forelse($komentars as $komentar)





<div class="
bg-white
rounded-3xl
shadow-md
hover:shadow-xl
transition duration-300
p-6">







<div class="flex gap-4">





{{-- Avatar --}}

<div class="
w-12 h-12
shrink-0
rounded-full
bg-gradient-to-br
from-blue-500
to-blue-700
text-white
flex items-center
justify-center
font-bold
text-lg">


{{ strtoupper(substr($komentar->user->name ?? 'U',0,1)) }}


</div>








<div class="flex-1">





{{-- Header --}}

<div class="
flex flex-col
md:flex-row
md:items-start
md:justify-between
gap-3">





<div>


<h3 class="
font-bold
text-gray-800
text-lg">

{{ $komentar->user->name ?? 'User' }}

</h3>



<p class="text-sm text-gray-400">

{{ $komentar->created_at->format('d M Y H:i') }}

</p>


</div>







<form
action="{{ route('admin.komentar.destroy',$komentar) }}"
method="POST">


@csrf

@method('DELETE')



<button
onclick="return confirm('Hapus komentar ini?')"

class="
px-3 py-2
rounded-xl
bg-red-100
text-red-600
hover:bg-red-600
hover:text-white
transition">


🗑 Hapus


</button>



</form>





</div>










{{-- Isi komentar --}}


<div class="
mt-5
bg-gray-50
rounded-2xl
p-5
border">


<p class="
text-gray-700
leading-relaxed">


{{ $komentar->isi }}


</p>


</div>









{{-- Artikel --}}


<div class="
mt-4
inline-flex
items-center
gap-2
px-4 py-2
rounded-full
bg-blue-100
text-blue-700
text-sm">


📄

{{ $komentar->artikel->judul ?? '-' }}


</div>









{{-- Balas komentar --}}



<div class="mt-6">


<form
action="{{ route('admin.komentar.reply',$komentar) }}"
method="POST">


@csrf



<div class="
flex flex-col
md:flex-row
gap-3">



<input

type="text"

name="isi"

placeholder="Tulis balasan admin..."

class="
flex-1
border
border-gray-300
rounded-xl
px-4
py-3

focus:outline-none
focus:ring-2
focus:ring-blue-300">





<button

class="
px-6
py-3
bg-blue-600
hover:bg-blue-700
text-white
rounded-xl
shadow
hover:shadow-lg
transition">


💬 Balas


</button>



</div>


</form>


</div>









{{-- Reply --}}



@if($komentar->replies->count())


<div class="
mt-8
ml-2
md:ml-10

border-l-4
border-blue-200

pl-5

space-y-4">





@foreach($komentar->replies as $reply)





<div class="
bg-blue-50
rounded-2xl
p-5">





<div class="flex gap-3">





<div class="
w-10
h-10
rounded-full
bg-blue-600
text-white
flex
items-center
justify-center
font-bold">


{{ strtoupper(substr($reply->user->name ?? 'A',0,1)) }}


</div>






<div>


<p class="font-semibold text-gray-800">

{{ $reply->user->name ?? 'Admin' }}

</p>



<p class="
text-gray-600
mt-2
leading-relaxed">


{{ $reply->isi }}


</p>



<p class="
text-xs
text-gray-400
mt-2">


{{ $reply->created_at->format('d M Y H:i') }}


</p>



</div>






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
shadow
p-12
text-center
text-gray-400">


<div class="text-5xl mb-4">

💬

</div>


Belum ada komentar.


</div>




@endforelse






</div>






<div class="mt-8">

{{ $komentars->links() }}

</div>





@endsection