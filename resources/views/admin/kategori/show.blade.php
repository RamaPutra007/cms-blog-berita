@extends('layouts.admin')

@section('title','Detail Kategori')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

<h1 class="text-3xl font-bold mb-5">

{{ $kategori->nama }}

</h1>

<p class="mb-3">

<strong>Slug :</strong>

{{ $kategori->slug }}

</p>

<p class="mb-5">

<strong>Total Artikel :</strong>

{{ $kategori->artikels->count() }}

</p>

<hr class="my-5">

<h2 class="text-xl font-bold mb-3">
Daftar Artikel
</h2>

@if($kategori->artikels->count())

<ul class="list-disc pl-6">

@foreach($kategori->artikels as $artikel)

<li>{{ $artikel->judul }}</li>

@endforeach

</ul>

@else

<p>Belum ada artikel pada kategori ini.</p>

@endif

</div>

@endsection