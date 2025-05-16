<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ApiSiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        return response()->json($siswa, 200);
    }

    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->gender = $request;
        $siswa->alamat = $request->alamat;
        $siswa->kontak = $request->kontak;
        $siswa->email = $request->email;
        $siswa->status_lapor_pkl = $request->status_lapor_pkl;
        $siswa->save();
        return response()->json($siswa, 201);
    }

    public function show($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa, 200);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->gender = $request->gender;
        $siswa->alamat = $request->alamat;
        $siswa->kontak = $request->kontak;
        $siswa->email = $request->email;
        $siswa->status_lapor_pkl = $request->status_lapor_pkl;
        $siswa->save();
        return response()->json($siswa);
    }

    // Hapus siswa
    public function destroy(string $id)
    {
        $siswa = Siswa::destroy($id);
        return response()->json(['message' => 'Siswa berhasil dihapus']);
    }
}
