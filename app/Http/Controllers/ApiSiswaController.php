<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiSiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('user')->get(); // Mengambil data siswa beserta user (untuk akses image)
        return response()->json($siswa, 200);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswa,nis',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:siswa,email|unique:users,email',
            'status_lapor_pkl' => 'required|in:Belum Lapor,Sudah Lapor',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Buat user baru
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('default_password'); // Ganti dengan password yang diinginkan
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename); // Simpan di storage/public/images
            $user->image = 'images/' . $filename; // Simpan path relatif
        }
        $user->save();

        // Buat siswa baru
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->gender = $request->gender;
        $siswa->alamat = $request->alamat;
        $siswa->kontak = $request->kontak;
        $siswa->email = $request->email;
        $siswa->status_lapor_pkl = $request->status_lapor_pkl;
        $siswa->save();

        return response()->json($siswa, 201);
    }

    public function show($id)
    {
        $siswa = Siswa::with('user')->find($id); // Mengambil data siswa beserta user
        if (!$siswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }
        return response()->json($siswa, 200);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswa,nis,' . $id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:siswa,email,' . $id . '|unique:users,email,' . $siswa->user->id,
            'status_lapor_pkl' => 'required|in:Belum Lapor,Sudah Lapor',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user
        $user = $siswa->user;
        $user->name = $request->nama;
        $user->email = $request->email;
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename);
            $user->image = 'images/' . $filename;
        }
        $user->save();

        // Update siswa
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

    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        // Hapus foto dari storage jika ada
        if ($siswa->user && $siswa->user->image) {
            Storage::delete('public/' . $siswa->user->image);
        }

        // Hapus user terkait
        if ($siswa->user) {
            $siswa->user->delete();
        }

        // Hapus siswa
        $siswa->delete();

        return response()->json(['message' => 'Siswa berhasil dihapus']);
    }
}
