@extends('layouts.layouts-adm')

@section('title', 'Katalog')

@section('content')
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 mb-3">
                <div class="card border-0 shadow-sm rounded-2">
                    <div class="card-body">
                        <h3 class="text-center py-3">Form Katalog</h3>
                        <form action="/add_katalog" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="form-label" for="kode">Kode</label>
                            <input class="form-control" name="kode" id="kode" type="number" required><br>
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" name="title" id="title" type="text" required><br>
                            <label class="form-label" for="deskripsi">Description</label>
                            <input class="form-control" name="deskripsi" id="deskripsi" type="text" required><br>
                            <label class="form-label" for="price">Price</label>
                            <input class="form-control" name="price" id="price" type="number" required><br>
                            <label class="form-label" for="image">Image</label>
                            <input class="form-control" name="image" id="image" type="file" accept=".png, .jpg, .jpeg"
                                required><br>
                            <button class="btn btn-primary mx-auto d-block" type="submit">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 my-3">
                <div class="card border-0 shadow-sm rouded-2">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($katalog as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td><img class="img-fluid rounded-2" src="/storage/{{ $item->image }}" alt="Image"
                                            width="80px" height="auto"></td>
                                    <td>Rp. {{ number_format($item->price, 0, ',','.') }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="">Update</a>
                                        <a class="btn btn-danger" href="">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection