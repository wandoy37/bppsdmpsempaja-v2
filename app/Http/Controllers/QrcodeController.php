<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class QrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qrcodes = Qrcode::all();
        return view('admin.qrcode.index', compact('qrcodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.qrcode.create');
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
                'link' => 'required',
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
            $qrname = mt_rand(1000, 9999) . '.png';
            FacadesQrCode::format('png')
                ->merge(asset('img/logo_kaltim.png'), .2, true)
                ->errorCorrection('M')
                ->size(500)
                ->generate($request->link, public_path('qrcode/' . $qrname));
            Qrcode::create([
                'title' => $request->title,
                'link' => $request->link,
                'qrcode' => $qrname,
            ]);
            return redirect()->route('qrcode.index')->with('success', 'berhasil membuat QRCODE baru');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('qrcode.index')->with('fails', 'gagal membuat QRCODE baru');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $qr = Qrcode::find($id);
            $path = public_path('/') . 'qrcode/';
            File::delete($path . $qr->qrcode);
            $qr->delete($qr);
            return redirect()->route('qrcode.index')->with('success', 'berhasil hapus QRCODE');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('qrcode.index')->with('fails', 'gagal hapus QRCODE');
        } finally {
            DB::commit();
        }
    }
}
