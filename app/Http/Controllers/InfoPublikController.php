<?php

namespace App\Http\Controllers;

use App\Models\InfoPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class InfoPublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info_publiks = InfoPublik::orderBy('id', 'DESC')->get();
        return view('admin.info_publik.index', compact('info_publiks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.info_publik.create');
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
            InfoPublik::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'konten' => $request->konten,
            ]);
            return redirect()->route('info-publik.index')->with('success', $request->title . ' berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('info-publik.index')->with('fails', $request->title . ' gagal ditambahkan.');
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
        $info_publik = InfoPublik::find($id);
        return view('admin.info_publik.edit', compact('info_publik'));
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
            $info_publik = InfoPublik::find($id);

            $info_publik->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'konten' => $request->konten,
            ]);
            return redirect()->route('info-publik.index')->with('success', $request->title . ' berhasil di update.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('info-publik.index')->with('fails', $request->title . ' gagal di update.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $info_publik = InfoPublik::find($id);
        DB::beginTransaction();
        try {
            $info_publik->delete($info_publik);
            return redirect()->route('info-publik.index')->with('success', $info_publik->title . ' telah dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('info-publik.index')->with('fails', $info_publik->title . ' gagal dihapus');
        } finally {
            DB::commit();
        }
    }
}
