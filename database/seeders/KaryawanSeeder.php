<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert([
            [
                'id_jabatan' => 1, // Ensure this ID exists in the jabatan table
                'nik' => '12345678901',
                'personalnumber' => 'PN0001',
                'email' => 'example1@example.com',
                'nama' => 'John Doe',
                'no_telpon' => '081234567890',
            ],
            [
                'id_jabatan' => 2, // Ensure this ID exists in the jabatan table
                'nik' => '12345678902',
                'personalnumber' => 'PN0002',
                'email' => 'example2@example.com',
                'nama' => 'Jane Smith', 
                'no_telpon' => '082345678901',
            ],
            // Add more entries as needed
        ]);
    }
}
