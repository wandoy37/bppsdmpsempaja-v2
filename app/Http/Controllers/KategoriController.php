<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::orderBy('id', 'DESC')->get();
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'wajib diisi.',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            Kategori::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
            ]);
            return redirect()->route('kategori.index')->with('success', $request->title . ' berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('kategori.index')->with('fails', $request->title . ' gagal ditambahkan.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'wajib diisi.',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            $kategori = Kategori::find($id);
            $kategori->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
            ]);
            return redirect()->route('kategori.index')->with('success', 'update kategori berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('kategori.index')->with('fails', 'update kategori gagal');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        DB::beginTransaction();
        try {
            $postingans = $kategori->postingans;
            foreach ($postingans as $postingan) {
                $path = public_path() . '/postingan/thumbnail/';
                File::delete($path . $postingan->thumbnail);
                $postingan->delete($postingan);
            }
            $kategori->delete($kategori);
            return redirect()->route('kategori.index')->with('success', $kategori->title . ' telah dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('kategori.index')->with('fails', $kategori->title . ' gagal dihapus');
        } finally {
            DB::commit();
        }
    }
}
