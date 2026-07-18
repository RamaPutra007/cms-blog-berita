@extends('layouts.admin')

@section('title','Tambah Artikel')

@section('content')

<h1 class="text-3xl font-bold mb-6">

Tambah Artikel

</h1>

<form
action="{{ route('admin.artikel.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

@include('admin.artikel.form')

</form>

@endsection