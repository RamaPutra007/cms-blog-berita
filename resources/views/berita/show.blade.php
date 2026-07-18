@extends('layouts.public')

@section('title','Detail Berita')

@section('content')

<section class="py-20">

<div class="max-w-4xl mx-auto px-6">

<h1 class="text-5xl font-bold">

Berita {{ $id }}

</h1>

<p class="mt-8 text-gray-600 leading-9">

Isi berita lengkap akan tampil di sini.

</p>

</div>

</section>

@endsection