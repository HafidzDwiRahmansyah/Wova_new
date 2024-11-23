@extends('layouts.layouts-adm')
@section('title', 'Add User')
@section('content')
    <h1>Tambah User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" class="form-control" required>

        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>

        <label>Password:</label>
        <input type="password" name="password" class="form-control" required>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
