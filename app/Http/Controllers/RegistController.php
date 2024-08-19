<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegistController extends Controller
{
    public function getAllUsers()
    {
        return User::all(); // Mengambil semua data pengguna
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:255|unique:users',
            // 'email' => 'required|email|max:255|unique:users',
            
            'name' => 'required|string',
            'password' => 'required|string|min:8',
        ]);
        $user = new User();
        $user->nik = $request->input('nik');
        $user->name = $request->input('name');
        // $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return Redirect::to('settinguser')->with('success', 'User added successfully!');
    }
    
}
