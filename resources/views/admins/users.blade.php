@extends('layouts.layout')
@section('title', 'Add User')

@section('content')
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow rounded-2">
                    <div class="card-body">
                        <h4 class="text-center py-5">Tambah User</h4>
                        <form action="/add_user" method="post">
                            @csrf
                            <label class="form-label" for="name">Nama</label>
                            <input class="form-control" type="text" name="name" id="name" required><br>
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required><br>
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required><br>
                            <button class="btn btn-primary mx-auto d-block" type="submit">Simpan User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection