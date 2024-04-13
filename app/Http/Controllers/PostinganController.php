<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postingans = Postingan::orderBy('id', 'DESC')->get();
        return view('admin.postingan.index', compact('postingans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.postingan.create', compact('kategoris'));
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
                'konten' => 'required',
                // 'thumbnail' => 'required',
                'filepath' => 'required',
                'kategori' => 'required',
                'created_at' => 'required',
            ],
            [],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            if ($request['thumbnail']) {
                // Make Directory
                $path = public_path() . '/postingan/thumbnail/';
                if (!file_exists($path)) {
                    File::makeDirectory($path, 0775, true, true);
                }
                // New Thumbnail
                $image = $request['thumbnail'];
                $imageName = uniqid(6) . '.png';
                // Resize Image
                $thumbnail = Image::make($image->getRealPath());
                // Save Image
                $thumbPath = $path . $imageName;
                $thumbnail = Image::make($thumbnail)->save($thumbPath);
            }

            Postingan::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-') . '-' . mt_rand(1000, 9999),
                'konten' => $request->konten,
                'thumbnail' => $request->filepath,
                'status' => $request->status,
                'kategori_id' => $request->kategori,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::parse($request->created_at),
            ]);
            return redirect()->route('postingan.index')->with('success', $request->title . ' berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('postingan.index')->with('fails', $request->title . ' gagal ditambahkan.');
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
        $postingan = Postingan::find($id);
        $kategoris = Kategori::all();
        return view('admin.postingan.edit', compact('postingan', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $postingan = Postingan::find($id);

        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'konten' => 'required',
                'kategori' => 'required',
                'filepath' => 'required',
            ],
            [],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            if ($request['thumbnail']) {
                // Make Directory
                $path = public_path() . '/postingan/thumbnail/';
                if (!file_exists($path)) {
                    File::makeDirectory($path, 0775, true, true);
                }

                // Old Thumbnail
                $oldThumbnail = $postingan->thumbnail;
                File::delete($path . $oldThumbnail);

                // New Thumbnail
                $image = $request['thumbnail'];
                $imageName = uniqid(6) . '.png';
                // Resize Image
                $thumbnail = Image::make($image->getRealPath());
                // Save Image
                $thumbPath = $path . $imageName;
                $thumbnail = Image::make($thumbnail)->save($thumbPath);
            }

            if ($request->created_at) {
                $update_date = Carbon::parse($request->created_at);
            }

            if ($request->title !== $postingan->title) {
                $slug = Str::slug($request->title, '-') . '-' . substr($postingan->slug, strrpos($postingan->slug, '-') + 1);
            } else {
                $slug = $postingan->slug;
            }

            $postingan->update([
                'title' => $request->title,
                'slug' => $slug,
                'konten' => $request->konten,
                'thumbnail' => $request->filepath,
                'status' => $request->status,
                'kategori_id' => $request->kategori,
                'user_id' => Auth::user()->id,
                'created_at' => $update_date ?? Carbon::parse($postingan->created_at)->format('d-m-Y'),
            ]);

            return redirect()->route('postingan.index')->with('success', 'Postingan berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('postingan.index')->with('fails', 'Postingan gagal ditambahkan.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postingan = Postingan::find($id);
        DB::beginTransaction();
        try {
            // $path = public_path() . '/postingan/thumbnail/';
            // File::delete($path . $postingan->thumbnail);

            $postingan->delete($postingan);
            return redirect()->route('postingan.index')->with('success', 'Postingan telah dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('postingan.index')->with('fails', 'Postingan gagal dihapus.');
        } finally {
            DB::commit();
        }
    }

    public function upload(Request $request)
    {
        $path = public_path() . '/postingan/textarea/';
        if (!file_exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // New Thumbnail
        $image = $request->file('file');
        $imageName = uniqid(6) . '.png';
        // Resize Image
        $thumbnail = Image::make($image->getRealPath());
        // Save Image
        $thumbPath = $path . $imageName;
        $thumbnail = Image::make($thumbnail)->save($thumbPath);

        // Return URL gambar yang diunggah
        $url = $path . $imageName;
        return response()->json(['location' => $url]);
    }
}
