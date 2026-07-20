@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')

    <div class="mb-6">

        <h1 class="text-3xl font-bold">

            Edit Pengguna

        </h1>

    </div>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">

        @csrf
        @method('PUT')

        @include('admin.users.form')

    </form>

@endsection
