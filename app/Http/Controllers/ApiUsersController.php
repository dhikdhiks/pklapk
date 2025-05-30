<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiUsersController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return response()->json($users, 200);
    }

    public function show($id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID
        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID

        // Validasi input
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update user
        if ($request->has('password')) {
            $validated['password'] = bcrypt($request->password);
        }
        $user->update($validated);

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID
        $user->delete(); // Menghapus user

        return response()->json(null, 204); // Mengembalikan respons sukses tanpa konten
    }
}
