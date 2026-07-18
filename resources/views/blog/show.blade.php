@extends('layouts.public')

@section('title','Detail Blog')

@section('content')

<section class="py-20">

<div class="max-w-4xl mx-auto px-6">

<h1 class="text-5xl font-bold">

Artikel {{ $id }}

</h1>

<p class="mt-8 text-gray-600 leading-9">

Isi artikel blog ditampilkan di sini.

</p>

</div>

</section>

@endsection