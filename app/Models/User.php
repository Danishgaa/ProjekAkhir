<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'karyawan_id',
        'role',
        'password',
    ];

    protected $hidden = [
        'role',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthIdentifierName()
    {
        return 'karyawan_id'; // Use karyawan_id for authentication
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id_karyawan');
    }

    public static function attemptLogin($request)
    {
        $user = self::whereHas('karyawan', function ($query) use ($request) {
            $query->where('personalnumber', $request->input('personalnumber'));
        })->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            return $user; // Mengembalikan objek User
        }

        return null; // Mengembalikan null jika login gagal
    }


}
