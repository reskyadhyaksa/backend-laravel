<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'age'   => 'required|integer|min:1|max:120',
        ]);

        // Simpan user ke database
        $user = User::create($validated);

        // Kembalikan response
        return response()->json([
            'message' => 'User created successfully',
            'data'    => $user
        ], 201);
    }

    public function index(Request $request)
    {
        $users = User::all();

        return response()->json($users);
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrfail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'age'   => 'sometimes|required|integer|min:1|max:120',
        ]);

        $user->update($validated);

        return response()->json([
            'message' => 'User updated successfully',
            'data'    => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
