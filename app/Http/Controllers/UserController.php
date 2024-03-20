<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'nomor_SIM' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->nama = $validatedData['nama'];
        $user->alamat = $validatedData['alamat'];
        $user->nomor_telepon = $validatedData['nomor_telepon'];
        $user->nomor_SIM = $validatedData['nomor_SIM'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
