@extends('layouts.admin')


@section('title','Tambah Berita')


@section('content')


<div class="mb-6">

    <h1 class="text-3xl font-bold">
        Tambah Berita
    </h1>

    <p class="text-gray-500">
        Tambahkan berita baru.
    </p>

</div>



<form
action="{{ route('admin.berita.store') }}"
method="POST"
enctype="multipart/form-data">


@csrf


@include('admin.berita.form')


</form>



@endsection