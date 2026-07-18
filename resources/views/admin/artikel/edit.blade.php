@extends('layouts.admin')

@section('title','Edit Artikel')

@section('content')

<h1 class="text-3xl font-bold mb-6">

Edit Artikel

</h1>

<form
action="{{ route('admin.artikel.update',$artikel) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

@include('admin.artikel.form')

</form>

@endsection