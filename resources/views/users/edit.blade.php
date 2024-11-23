@extends('layouts.layouts-adm')
@section('title', 'Tambah User')
@section('content')
<h1>Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama:</label>
    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>

    <label>Email:</label>
    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>

    <label>Password (Kosongkan jika tidak ingin diubah):</label>
    <input type="password" name="password" class="form-control">

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection