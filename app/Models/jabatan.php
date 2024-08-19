<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;
    protected $fillable = ['jabatan'];
    protected $table = 'jabatan';
    public $timestamps = true;
    protected $primaryKey = 'id_jabatan'; // Sesuaikan dengan nama kolom primary key yang benar

    public function karyawann()
    {
        return $this->hasMany(karyawan::class, 'id_jabatan', 'id_jabatan');
    }
}
