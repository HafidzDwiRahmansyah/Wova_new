<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\katalog;
use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.login');
    }
    public function store(Request $request)
    {
        $image = $request->image->store('image', 'public');

        $katalog = new Katalog();

        $katalog->kode = $request->kode;
        $katalog->image = $image;
        $katalog->title = $request->title;
        $katalog->deskripsi = $request->deskripsi;
        $katalog->price = $request->price;

        $katalog->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function login(Request $request) {
        $user = new User();
    }
}
