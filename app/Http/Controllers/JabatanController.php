<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        // Fetch jabatan data for the dropdown
        $jabatanList = jabatan::all();

        $jumlahbaris = 5;
        
        $data = jabatan::orderBy('id_jabatan', 'asc')->paginate($jumlahbaris);

        $user = Auth::user();
        $karyawan = $user->karyawan; // Fetch the related karyawan record
        return view('Admin.jabatan', compact('user', 'karyawan', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255|regex:/^[a-zA-Z\s]*$/|unique:jabatan,jabatan',
        ], [
            'jabatan.required' => 'Isi nama jabatan',
            'jabatan.string' => 'Nama jabatan harus teks',
            'jabatan.regex' => 'Nama jabatan tidak boleh mengandung angka atau karakter khusus.',
            'jabatan.unique' => 'Nama jabatan sudah ada, silakan masukkan nama lain.'
        ]);
    
        jabatan::create([
            'jabatan' => $request->jabatan,
        ]);
    
        return redirect()->back()->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = jabatan::find($id);
        return view('Admin.jabatan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255|regex:/^[a-zA-Z\s]*$/|unique:jabatan,jabatan',
        ], [
            'jabatan.required' => 'Isi nama jabatan',
            'jabatan.string' => 'Nama jabatan harus teks',
            'jabatan.regex' => 'Nama jabatan tidak boleh mengandung angka atau karakter khusus.',
            'jabatan.unique' => 'Nama jabatan sudah ada, silakan masukkan nama lain.'
        ]);
    
        $jabatan = jabatan::find($id);
        if ($jabatan) {
            $jabatan->jabatan = $request->jabatan;
            $jabatan->save();

            return redirect()->back()->with('success', 'Jabatan berhasil diupdate!');
        } else {
            return redirect()->back()->with('error', 'Jabatan tidak ditemukan!');
        }
    }

    public function destroy($id)
    {
        $jabatan = jabatan::find($id);
    
        if ($jabatan) {
            $jabatan->delete();
            return redirect()->back()->with('success', 'Jabatan berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Jabatan tidak ditemukan!');
        }
    }
}
