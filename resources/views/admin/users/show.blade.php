@extends('layouts.admin')

@section('title','Detail Pengguna')

@section('content')

<div class="bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold mb-6">

        Detail Pengguna

    </h1>

    <div class="space-y-4">

        <div>

            <strong>Nama</strong>

            <p>{{ $user->name }}</p>

        </div>

        <div>

            <strong>Email</strong>

            <p>{{ $user->email }}</p>

        </div>

        <div>

            <strong>Role</strong>

            <p class="capitalize">

                {{ $user->role }}

            </p>

        </div>

        <div>

            <strong>Dibuat</strong>

            <p>

                {{ $user->created_at->format('d M Y H:i') }}

            </p>

        </div>

    </div>

    <a
        href="{{ route('admin.users.index') }}"
        class="inline-block mt-8 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

        Kembali

    </a>

</div>

@endsection