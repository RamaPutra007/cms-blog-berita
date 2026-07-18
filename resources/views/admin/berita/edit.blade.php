@extends('layouts.admin')


@section('title','Edit Berita')


@section('content')


<div class="mb-6">

<h1 class="text-3xl font-bold">
    Edit Berita
</h1>

<p class="text-gray-500">
    Perbarui data berita.
</p>

</div>



<form
action="{{ route('admin.berita.update',$berita) }}"
method="POST"
enctype="multipart/form-data">


@csrf

@method('PUT')


@include('admin.berita.form')


</form>



@endsection