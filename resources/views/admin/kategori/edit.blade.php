@extends('layouts.admin')

@section('title','Edit Kategori')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Kategori
</h1>

<form action="{{ route('admin.kategori.update',$kategori) }}" method="POST">

    @csrf
    @method('PUT')

    @include('admin.kategori.form')

</form>

@endsection