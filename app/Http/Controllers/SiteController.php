<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function beranda()
    {
        $kategories = Kategori::all();
        $lastPosts = Postingan::latest()->take(2)->get();;
        $recentPostingans = Postingan::latest()->skip(2)->take(2)->get();
        return view('site.beranda', compact('kategories', 'lastPosts', 'recentPostingans'));
    }

    public function profil()
    {
        return view('site.profil');
    }

    // Function Berita 
    public function berita()
    {
        return view('site.berita.index');
    }

    public function show($slug)
    {
        $postingan = Postingan::where('slug', $slug)->first();
        // return response()->json($postingan);
        return view('site.berita.show', compact('postingan'));
    }
    // Akhir Function Berita



    public function kontak()
    {
        return view('site.kontak');
    }
}
