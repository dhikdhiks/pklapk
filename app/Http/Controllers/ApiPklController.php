<?php

namespace App\Http\Controllers;

use App\Models\Pkl;
use Illuminate\Http\Request;

class ApiPklController extends Controller
{
    // Ambil semua data PKL
    public function index()
    {
        $pkl = Pkl::with(['guru', 'siswa', 'industri'])->get();
        return response()->json($pkl, 200);
    }

    // Simpan data PKL baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'siswa_id' => 'required|exists:siswas,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $pkl = Pkl::create($validated);
        return response()->json($pkl, 201);
    }

    // Ambil data PKL berdasarkan ID
    public function show($id)
    {
        $pkl = Pkl::with(['guru', 'siswa', 'industri'])->findOrFail($id);
        return response()->json($pkl, 200);
    }

    // Update data PKL
    public function update(Request $request, $id)
    {
        $pkl = Pkl::findOrFail($id);

        $validated = $request->validate([
            'guru_id' => 'sometimes|required|exists:gurus,id',
            'siswa_id' => 'sometimes|required|exists:siswas,id',
            'industri_id' => 'sometimes|required|exists:industris,id',
            'mulai' => 'sometimes|required|date',
            'selesai' => 'sometimes|required|date|after_or_equal:mulai',
        ]);

        $pkl->update($validated);
        return response()->json($pkl, 200);
    }

    // Hapus data PKL
    public function destroy($id)
    {
        $pkl = Pkl::findOrFail($id);
        $pkl->delete();

        return response()->json(['message' => 'Data PKL berhasil dihapus'], 200);
    }
}
