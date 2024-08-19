<?php

namespace App\Http\Controllers;

use App\Models\reimburse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReimburseFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $karyawan = $user->karyawan; // Fetch the related karyawan record
        return view('karyawan.ReimburseForm', compact('user', 'karyawan'));
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
        {
            $request->validate([
                'id_user' => 'required',
                'category_id' => 'required',
                'datetime' => 'required|date',
                'harga' => 'required|numeric',
                'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
            ]);
    
            $reimburse = new reimburse();
            $reimburse->nik = $request->nik;
            $reimburse->category_id = $request->category_id;
            $reimburse->datetime = $request->datetime;
            $reimburse->harga = str_replace(',', '', $request->harga);
            
            if ($request->hasFile('file')) {
                $filename = time() . '.' . $request->file->getClientOriginalExtension();
                $path = $request->file->storeAs('reimbursements', $filename, 'public');
                $reimburse->file = $path;
            }
    
            $reimburse->save();
    
            return redirect()->route('reimburse.index')->with('success', 'Reimbursement data added successfully.');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
