<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'karyawan_id' => 1, // Ensure this ID exists in the karyawan table
                'role' => 'admin',
                'password' => Hash::make('123123123'), // Securely hashed password
            ],
            [
                'karyawan_id' => 2, // Ensure this ID exists in the karyawan table
                'role' => 'karyawan',
                'password' => Hash::make('123123123'), // Securely hashed password
            ],
            // Add more entries as needed
        ]);
    }
}
