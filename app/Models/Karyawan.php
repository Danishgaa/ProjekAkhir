<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $primaryKey = 'id_karyawan';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'id_jabatan',
        'nik',
        'personalnumber',
        'email',
        'nama',
        'no_telpon',
    ];

    /**
     * Get the user associated with the karyawan.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'karyawan_id', 'id_karyawan');
    }
}
