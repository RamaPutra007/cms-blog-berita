@extends('layouts.public')

@section('title','Kategori')

@section('content')

<section class="py-20 bg-gray-50">

<div class="max-w-7xl mx-auto px-6">

<h1 class="text-5xl font-bold mb-12">

Kategori Berita

</h1>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

@php
$kategori=[
'Teknologi',
'Pendidikan',
'Olahraga',
'Ekonomi',
'Politik',
'Kesehatan'
];
@endphp

@foreach($kategori as $key=>$item)

<a href="{{ route('kategori.show',$key+1) }}"
class="bg-white p-8 rounded-2xl shadow hover:shadow-xl">

<h2 class="text-2xl font-bold">

{{ $item }}

</h2>

<p class="text-gray-600 mt-3">

Klik untuk melihat berita kategori {{ $item }}

</p>

</a>

@endforeach

</div>

</div>

</section>

@endsection