@extends('layouts.public')

@section('title','Blog')

@section('content')

<section class="py-20">

<div class="max-w-7xl mx-auto px-6">

<h1 class="text-5xl font-bold mb-10">

Blog

</h1>

<div class="grid md:grid-cols-3 gap-8">

@for($i=1;$i<=6;$i++)

<div class="bg-white rounded-2xl shadow overflow-hidden">

<img src="https://picsum.photos/600/400?random={{ $i }}"
class="w-full h-52 object-cover">

<div class="p-6">

<h3 class="text-2xl font-bold mb-3">

Artikel {{ $i }}

</h3>

<p class="text-gray-600">

Artikel mengenai teknologi,
pendidikan dan informasi terbaru.

</p>

<a href="{{ route('blog.show',$i) }}"
class="text-blue-600 font-semibold mt-4 inline-block">

Baca Selengkapnya →

</a>

</div>

</div>

@endfor

</div>

</div>

</section>

@endsection