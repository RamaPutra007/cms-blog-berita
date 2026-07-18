@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Dashboard Admin
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-500">Total User</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalUser }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-500">Total Penulis</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalPenulis }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-500">Total Artikel</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalArtikel }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-500">Total Kategori</h3>
        <p class="text-4xl font-bold mt-2">
            {{ $totalKategori }}
        </p>
    </div>

</div>

@endsection