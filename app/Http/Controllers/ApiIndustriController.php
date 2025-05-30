<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industri;

class ApiIndustriController extends Controller
{
    public function index()
    {
        $industri = Industri::all(); // Mengambil semua data industri
        return response()->json($industri, 200);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:industris,email',
            'website' => 'nullable|url|max:255',
        ]);

        // Buat industri baru
        $industri = Industri::create($validated);

        return response()->json($industri, 201);
    }

    public function show($id)
    {
        $industri = Industri::findOrFail($id); // Mengambil data industri berdasarkan ID
        return response()->json($industri, 200);
    }

    public function update(Request $request, $id)
    {
        $industri = Industri::findOrFail($id); // Mengambil data industri berdasarkan ID

        // Validasi input
        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'kontak' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:industris,email,' . $id,
        ]);

        // Update industri
        $industri->update($validated);

        return response()->json($industri, 200);
    }

    public function destroy($id)
    {
        $industri = Industri::findOrFail($id); // Mengambil data industri berdasarkan ID
        $industri->delete(); // Menghapus industri

        return response()->json(null, 204); // Mengembalikan respons kosong dengan status 204 No Content
    }
}
