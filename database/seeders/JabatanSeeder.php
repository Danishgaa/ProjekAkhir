<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'id_jabatan' => 1, // Ensure this ID exists in the jabatan table
                'jabatan' => 'admin',
            ],
            [
                'id_jabatan' => 2, // Ensure this ID exists in the jabatan table
                'jabatan' => 'karyawan',
            ],
        ]);
    }
}
