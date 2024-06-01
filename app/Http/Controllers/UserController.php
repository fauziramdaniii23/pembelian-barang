<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user', compact('user'));
    }

    // Memproses update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'address' => 'required|max:255',
            'phone_number' => 'required|string',
            'sim_number' => 'required|string',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.edit', $user->id)->with('success', 'Data pengguna berhasil diperbarui.');
    }
}
