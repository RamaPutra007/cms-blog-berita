@extends('layouts.admin')

@section('title','Tambah Pengguna')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold">

        Tambah Pengguna

    </h1>

</div>

<form
action="{{ route('admin.users.store') }}"
method="POST">

@csrf

@include('admin.users.form')

</form>

@endsection