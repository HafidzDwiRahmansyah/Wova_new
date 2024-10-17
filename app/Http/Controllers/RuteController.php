<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\katalog;

class RuteController extends Controller
{
    public function index()
    {
        $katalog = katalog::all();
        return view('index', compact('katalog'));
    }

    public function about()
    {
        return view('about');
    }

    public function katalog()
    {
        $katalog = katalog::all();
        return view('admins.katalogs', compact('katalog'));
    }

    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function add_user()
    {
        return view('admins.users');
    }
}
