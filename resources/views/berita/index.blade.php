@extends('layouts.public')

@section('title','Berita')

@section('content')

<section class="py-20 bg-gray-100">

<div class="max-w-7xl mx-auto px-6">

<h1 class="text-5xl font-bold mb-12">

Berita Terbaru

</h1>

<div class="grid md:grid-cols-3 gap-8">

@for($i=1;$i<=6;$i++)

<div class="bg-white rounded-2xl shadow">

<img src="https://picsum.photos/600/400?random={{ $i+20 }}"
class="w-full h-56 object-cover">

<div class="p-6">

<h2 class="text-2xl font-bold">

Judul Berita {{ $i }}

</h2>

<p class="mt-3 text-gray-600">

Ringkasan berita terbaru.

</p>

<a href="{{ route('berita.show',$i) }}"
class="inline-block mt-5 text-blue-600">

Baca →

</a>

</div>

</div>

@endfor

</div>

</div>

</section>

@endsection