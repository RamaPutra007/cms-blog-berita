@extends('layouts.admin')

@section('title','Data Pengguna')


@section('content')


<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">


    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            👥 Data Pengguna
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola pengguna dan hak akses sistem.
        </p>

    </div>




    <a href="{{ route('admin.users.create') }}"
        class="inline-flex items-center justify-center gap-2
        px-5 py-3
        bg-blue-600 hover:bg-blue-700
        text-white rounded-xl
        shadow-md hover:shadow-xl
        hover:-translate-y-1
        transition duration-300">


        ➕ Tambah Pengguna


    </a>


</div>





@if(session('success'))

<div class="mb-6
bg-green-100 border border-green-300
text-green-700
px-5 py-4 rounded-xl shadow-sm">


    ✅ {{ session('success') }}


</div>

@endif







<div class="bg-white rounded-3xl shadow-xl overflow-hidden">



<div class="overflow-x-auto">



<table class="w-full text-left">



<thead class="bg-gray-100 text-gray-700">


<tr>


<th class="px-6 py-4">
No
</th>


<th class="px-6 py-4">
Pengguna
</th>


<th class="px-6 py-4">
Email
</th>


<th class="px-6 py-4">
Role
</th>


<th class="px-6 py-4 text-center">
Aksi
</th>


</tr>


</thead>






<tbody class="divide-y">



@forelse($users as $user)



<tr class="hover:bg-gray-50 transition duration-300">





<td class="px-6 py-4 font-medium">


{{ $users->firstItem()+$loop->index }}


</td>







<td class="px-6 py-4">



<div class="flex items-center gap-3">



<div
class="w-11 h-11 rounded-full
bg-blue-600 text-white
flex items-center justify-center
font-bold text-lg">


{{ strtoupper(substr($user->name,0,1)) }}


</div>




<div>


<p class="font-semibold text-gray-800">


{{ $user->name }}


</p>



<p class="text-sm text-gray-400">


User


</p>


</div>



</div>



</td>








<td class="px-6 py-4 text-gray-600">


{{ $user->email }}


</td>








<td class="px-6 py-4">


@if($user->role == 'admin')


<span
class="inline-flex items-center gap-1
px-4 py-1 rounded-full
bg-red-100 text-red-700
text-sm font-semibold">


🛡 Admin


</span>



@else



<span
class="inline-flex items-center gap-1
px-4 py-1 rounded-full
bg-blue-100 text-blue-700
text-sm font-semibold">


✍ Penulis


</span>



@endif


</td>










<td class="px-6 py-4">


<div class="flex justify-center gap-2">





{{-- Detail --}}

<a href="{{ route('admin.users.show',$user) }}"
class="
w-10 h-10
flex items-center justify-center
rounded-xl
bg-green-100 text-green-700
hover:bg-green-600 hover:text-white
transition duration-300
shadow-sm hover:shadow-md"
title="Detail">


👁


</a>









{{-- Edit --}}

<a href="{{ route('admin.users.edit',$user) }}"
class="
w-10 h-10
flex items-center justify-center
rounded-xl
bg-yellow-100 text-yellow-700
hover:bg-yellow-500 hover:text-white
transition duration-300
shadow-sm hover:shadow-md"
title="Edit">


✏


</a>










{{-- Hapus --}}

<form
action="{{ route('admin.users.destroy',$user) }}"
method="POST"
onsubmit="return confirm('Yakin hapus pengguna ini?')">


@csrf

@method('DELETE')



<button
class="
w-10 h-10
flex items-center justify-center
rounded-xl
bg-red-100 text-red-700
hover:bg-red-600 hover:text-white
transition duration-300
shadow-sm hover:shadow-md"
title="Hapus">


🗑


</button>



</form>





</div>


</td>






</tr>





@empty



<tr>

<td colspan="5"
class="text-center py-12 text-gray-400">


👤

<br>

Belum ada pengguna.


</td>

</tr>



@endforelse






</tbody>



</table>



</div>



</div>








<div class="mt-6">

{{ $users->links() }}

</div>



@endsection