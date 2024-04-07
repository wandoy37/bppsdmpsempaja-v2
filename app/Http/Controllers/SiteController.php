<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function beranda()
    {
        return view('site.beranda');
    }

    public function profil()
    {
        return view('site.profil');
    }

    public function berita()
    {
        return view('site.berita');
    }

    public function kontak()
    {
        return view('site.kontak');
    }
}
