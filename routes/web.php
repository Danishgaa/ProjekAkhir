<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\DataReimburseController;
use App\Http\Controllers\FormKaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JabatanKontroller;
use App\Http\Controllers\KaryawanAdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\ReimburseController;
use App\Http\Controllers\ReimburseFormController;
use App\Http\Controllers\SettingUserController;
use App\Http\Controllers\TableKaryawanController;
use App\Http\Controllers\TableReimburseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute-rute yang ada di sini hanya bisa diakses oleh pengguna yang belum login
    Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class,'index'])->name('login');
    // manggil fungsi login di sesi controller
    Route::post('/',[SesiController::class,'login']);
});
Route::GET('/home',function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    // ini untuk admin login
    Route::get('/admin', [AdminController::class, 'index'])->middleware('role:admin');
    // buat karyawan login
    Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware('role:karyawan');
    // Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout'); // Define a name for the logout route

// Define the login route
Route::post('/user/daftar', [RegistController::class, 'store'])->name('daftar.store')->middleware('role:admin');

});


//----------------------------- Role Admin ----------------------------------------------------//
// kategori
// edit and Update
Route::resource('kategori', KategoriController::class);
// // Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

// //Delete
// // Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


// // jabatan
// // edit and Update
Route::resource('jabatan', JabatanController::class);
// // Route::put('jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
// //Delete
// // Route::delete('jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

// // settinguser
Route::resource('settinguser', SettingUserController::class);
// Route::get('settinguser/data', [SettingUserController::class, 'anyData'])->name('settinguser.data');
// // Route::get('/setting-user', [SettingUserController::class, 'index']);

// // karyawan
Route::resource('formkaryawan', FormKaryawanController::class);
Route::get('karyawanadmin', [KaryawanAdminController::class, 'index']);

// reimburse
Route::resource('datareimburse', DataReimburseController::class);
Route::resource('reimburse', ReimburseController::class);


// //----------------------------- Role Karyawan ----------------------------------------------------//

// // Data Karyawan
// Route::resource('datakaryawan', DataKaryawanController::class);
// // Route::get('/data-karyawan', [DataKaryawanController::class, 'index']);

// // Table Karyawan
// Route::resource('tablekaryawan', TableKaryawanController::class);
// // Route::get('/table-karyawan', [TableKaryawanController::class, 'index']);
// // Route::put('tablekaryawan/{id}', [TableKaryawanController::class, 'update'])->name('tablekaryawan.update');

// // Reimburse
Route::resource('reimburseform', ReimburseFormController::class);
Route::resource('tablereimburse', TableReimburseController::class);





