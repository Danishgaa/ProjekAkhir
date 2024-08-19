<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];
    protected $table = 'category';
    public $timestamps = true;
    protected $primaryKey = 'id_category'; // Sesuaikan dengan nama kolom primary key yang benar
}
