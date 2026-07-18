@extends('layouts.admin')

@section('title','Tambah Kategori')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah Kategori
</h1>

<form action="{{ route('admin.kategori.store') }}" method="POST">

    @csrf

    @include('admin.kategori.form')

</form>

@endsection