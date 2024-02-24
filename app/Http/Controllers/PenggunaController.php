<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas = User::all();
        return view('admin.pengguna.index', compact('penggunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengguna.create');
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
                'username' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required',
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
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'email_verified_at' => now(),
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'remember_token' => Str::random(10),
            ]);
            return redirect()->route('pengguna.index')->with('success', $request->username . ' berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pengguna.index')->with('fails', $request->username . ' gagal ditambahkan.');
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
        $pengguna = User::find($id);
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengguna = User::find($id);
        // Validator
        if ($request->password) {
            $validator = Validator::make(
                $request->all(),
                [
                    'username' => 'required',
                    'email' => 'required|unique:users,email,' . $pengguna->id,
                    'password' => 'required|confirmed|min:6',
                    'password_confirmation' => 'required',
                ],
                [],
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'username' => 'required',
                    'email' => 'required|unique:users,email,' . $pengguna->id,
                ],
                [],
            );
        }

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            $dataPengguna = [
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
            ];

            if ($request->filled('password')) {
                $dataPengguna['password'] = Hash::make($request->password);
            } else {
                $dataPengguna['password'] = $pengguna->password;
            }

            $pengguna->update($dataPengguna);

            if (Auth::user()->role == 'admin') {
                return redirect()->route('pengguna.index')->with('success', $request->username . ' berhasil diupdate.');
            } else {
                return redirect()->route('pengguna.edit', $pengguna->id)->with('success', $request->username . ' berhasil diupdate.');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            if (Auth::user()->role == 'admin') {
                return redirect()->route('pengguna.index')->with('fails', $request->username . ' gagal diupdate.');
            } else {
                return redirect()->route('pengguna.edit', $pengguna->id)->with('fails', $pengguna->username . ' gagal diupdate.');
            }
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = User::find($id);
        DB::beginTransaction();
        try {
            $postingans = $pengguna->postingans;
            foreach ($postingans as $postingan) {
                $path = public_path() . '/postingan/thumbnail/';
                File::delete($path . $postingan->thumbnail);
                $postingan->delete($postingan);
            }
            $pengguna->delete($pengguna);
            return redirect()->route('pengguna.index')->with('success', $pengguna->username . ' telah dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pengguna.index')->with('fails', $pengguna->username . ' gagal dihapus');
        } finally {
            DB::commit();
        }
    }
}
