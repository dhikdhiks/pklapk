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
        $siswa = Siswa::all(); // Hanya ambil data siswa tanpa relasi
        return response()->json($siswa, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswa,nis',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:siswa,email|unique:users,email',
            'status_lapor_pkl' => 'required|in:Belum Lapor,Sudah Lapor',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('default_password');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $user->image = 'images/' . $filename;
        }
        $user->save();

        $siswa = Siswa::create($request->only([
            'nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'status_lapor_pkl'
        ]));

        return response()->json($siswa, 201);
    }

    public function show($id)
    {
        $siswa = Siswa::find($id);
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

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswa,nis,' . $id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => [
                'required',
                'email',
                'unique:siswa,email,' . $id,
                'unique:users,email,' . optional($siswa->user)->id,
            ],
            'status_lapor_pkl' => 'required|in:Belum Lapor,Sudah Lapor',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update atau buat user
        if (!$siswa->user) {
            $user = new User();
            $user->password = bcrypt('default_password');
        } else {
            $user = $siswa->user;
        }

        $user->name = $request->nama;
        $user->email = $request->email;
        if ($request->hasFile('foto')) {
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $user->image = 'images/' . $filename;
        }
        $user->save();

        // Update siswa
        $siswa->update($request->only([
            'nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'status_lapor_pkl'
        ]));

        return response()->json($siswa);
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        if ($siswa->user && $siswa->user->image) {
            Storage::delete('public/' . $siswa->user->image);
        }

        if ($siswa->user) {
            $siswa->user->delete();
        }

        $siswa->delete();

        return response()->json(['message' => 'Siswa berhasil dihapus']);
    }
}
