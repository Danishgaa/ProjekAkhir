<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
        {
            $jumlahbaris = 5;
            $data = kategori::orderBy('id_category', 'asc')->paginate($jumlahbaris);
            $user = Auth::user();
            $karyawan = $user->karyawan; // Fetch the related karyawan record
            return view('Admin.kategori', compact('user', 'karyawan', 'data'));
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
        // $data = [
        //     'nama' => $request->nama
        // ];
        // kategori::create($data);

        $request->validate([
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]*$/|unique:category,nama',
        ], [
            'nama.required' => 'Isi nama kategori',
            'nama.string' => 'Nama kategori harus teks',
            'nama.regex' => 'Nama kategori tidak boleh mengandung angka atau karakter khusus.',
            'nama.unique' => 'Nama kategori sudah ada, silakan masukkan nama lain.'
        ]);
    
        Kategori::create([
            'nama' => $request->nama,
        ]);
    
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
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
    public function edit(Request $request, $id)
    {
        $data = kategori::where('id_category', $id)->first();
        return view('kategori', compact('data'));
        
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
        $request->validate([
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]*$/|unique:category,nama',
        ],[
            'nama.required'=> 'isi nama kategori',
            'nama.string'=> 'nama kategori harus teks',
            'nama.regex' => 'Nama kategori tidak boleh mengandung angka atau karakter khusus.'
        ]);
    
        $kategori = Kategori::where('id_category', $id)->first();
        if ($kategori) {
        $kategori->nama = $request->nama;
        $kategori->save();

                return redirect()->back()->with('success', 'Kategori berhasil diupdate!');
            } else {
                return redirect()->back()->with('error', 'Kategori tidak ditemukan!');
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
        $kategori = Kategori::find($id);
    
        if ($kategori) {
            $kategori->delete();
            return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan!');
        }
    }
}
