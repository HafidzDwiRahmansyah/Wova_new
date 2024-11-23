<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\katalog;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Cek kredensial login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, redirect ke halaman dashboard atau halaman lain yang diinginkan
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['error' => 'Username atau password salah!']);
    }

    public function destroy($id)
    {
        $katalog = Katalog::find($id);

        if ($katalog) {
            $katalog->delete();
            return redirect()->back()->with('success', 'Katalog berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Katalog tidak ditemukan.');
        }
    }
}
