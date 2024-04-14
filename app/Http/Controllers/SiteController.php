<?php

namespace App\Http\Controllers;

use App\Models\InfoPublik;
use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function welcome()
    {
        return view('site.welcome');
    }
    public function beranda()
    {
        $kategories = Kategori::all();
        $lastPosts = Postingan::orderBy('id', 'DESC')->take(2)->get();
        $recentPostingans = Postingan::orderBy('id', 'DESC')->skip(2)->take(2)->get();
        $info_publiks = InfoPublik::all();
        return view('site.beranda', compact('kategories', 'lastPosts', 'recentPostingans', 'info_publiks'));
    }

    public function profil()
    {
        $info_publiks = InfoPublik::all();
        return view('site.profil', compact('info_publiks'));
    }

    // Function Berita Index
    public function berita(Request $request)
    {
        // Menginisialisasi query builder
        $postingans = Postingan::where('status', 'publish');
        // Mencari data berdasarkan nilai search
        if (request('search')) {
            $postingans->where('title', 'LIKE', '%' . request('search') . '%');
        }
        // Mengambil hasil dan membatasi
        $postingans = $postingans->orderBy('id', 'DESC')->paginate(5);

        if ($request->ajax()) {
            $view = view('site.berita.data', compact('postingans'))->render();

            return response()->json(['html' => $view]);
        }

        $kategories = Kategori::all();
        $recentPostingans = Postingan::orderBy('id', 'DESC')->skip(2)->take(2)->get();

        $info_publiks = InfoPublik::all();
        return view('site.berita.index', compact('postingans', 'recentPostingans', 'kategories', 'info_publiks'));
    }

    public function informasi_publik_show($slug)
    {
        $info_publik = InfoPublik::where('slug', $slug)->first();
        $info_publiks = InfoPublik::all();
        return view('site.info_publik.show', compact('info_publik', 'info_publiks'));
    }

    // Kategori Berita Index
    public function kategori_berita_index(Request $request, $slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        $postingans = Postingan::where('kategori_id', $kategori->id)->paginate(5);
        if ($request->ajax()) {
            $view = view('site.berita.data', compact('postingans'))->render();

            return response()->json(['html' => $view]);
        }

        $kategories = Kategori::all();
        $recentPostingans = Postingan::orderBy('id', 'DESC')->skip(2)->take(2)->get();

        $info_publiks = InfoPublik::all();
        return view('site.berita.kategori', compact('kategori', 'postingans', 'kategories', 'recentPostingans', 'info_publiks'));
    }

    public function show($slug)
    {
        $postingan = Postingan::where('slug', $slug)->first();
        $info_publiks = InfoPublik::all();
        return view('site.berita.show', compact('postingan', 'info_publiks'));
    }
    // Akhir Function Berita



    public function kontak()
    {
        $info_publiks = InfoPublik::all();
        return view('site.kontak', compact('info_publiks'));
    }
}
