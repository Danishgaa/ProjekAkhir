<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\Karyawan;
use App\Models\karyawann;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jabatanList = jabatan::all(); // Fetch all jabatan
        // $data = Karyawan::with('jabatan')->orderBy('id_jabatan', 'asc')->paginate(10);

        $jumlahbaris = 5;
        $data = Karyawan::orderBy('id_karyawan', 'asc')->paginate($jumlahbaris);
        $user = Auth::user();
        
        $karyawan = $user->karyawan; // Fetch the related karyawan record
        return view('Admin.KaryawanAdmin', compact('user', 'karyawan', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Karyawan::find($id);
        return view('Admin.karyawanadmin', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $employee = Karyawan::findOrFail($id);
            $employee->update($request->all());
    
            return redirect()->route('karyawanadmin.index')->with('success', 'Employee updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Temukan data karyawan berdasarkan ID
         $karyawan = karyawan::findOrFail($id);
         // Hapus data karyawan dari database
         $karyawan->delete();
 
         // Redirect dengan pesan sukses
         return redirect()->route('karyawanadmin.index')->with('success', 'Employee deleted successfully');
    }
}
