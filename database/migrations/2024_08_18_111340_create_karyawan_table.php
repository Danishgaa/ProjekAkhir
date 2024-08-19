<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan'); // Primary Key, unsignedBigInteger
            $table->unsignedBigInteger('id_jabatan'); // Foreign Key
            $table->string('nik', 11)->unique();
            $table->string('personalnumber', 11)->unique();
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('no_telpon');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
