<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    // fungsi login
    
function login(Request $request)
{
    $request->validate([
        'personalnumber' => 'required',
        'password' => 'required',
    ], [
        'personalnumber.required' => 'NIK Wajib Diisi',
        'password.required' => 'Password Wajib Diisi',
    ]);

    // Cari karyawan berdasarkan personalnumber
    $karyawan = Karyawan::where('personalnumber', $request->personalnumber)->first();

    if ($karyawan) {
        // Cari user yang terkait dengan karyawan ini
        $user = $karyawan->user;

        // Validasi password
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if ($user->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/karyawan');
            }
        }
    }

    return redirect()->back()->withErrors(['personalnumber' => 'Personalnumber atau password yang Anda masukkan tidak sesuai'])->withInput();
}

    // logout function dashboard
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    
    
}
