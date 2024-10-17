@extends('layouts.layouts-adm')

@section('title', 'Page Drop CV Lama')

@section('content')
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 rounded-2">
                    <div class="card-body">
                        <h4 class="text-center pb-4">Data Drov CV Lama</h4>
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama File</th>
                                <th>Note</th>
                                <th>Aksi</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kode_cv }}</td>
                                    <td>{{ $data->file }}</td>
                                    <td>{{ $data->Note }}</td>
                                    <td>
                                        <button class="btn btn-primary">Download Data</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection