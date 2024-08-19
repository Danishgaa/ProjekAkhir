<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reimburse extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'category_id', 'datetime', 'harga', 'file'];

    // public function karyawan()
    // {
    //     return $this->belongsTo(karyawan::class, 'nik', 'nik');
    // }

    public function category()
    {
        return $this->belongsTo(kategori::class, 'id_category');
    }
}
