<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'admin.absen');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('profil','admin.profil');
Route::post('/profil', function () {
   User::where('id', Auth::user()->id)->update(
        [
            'avatar' => request()->file('avatar')->store('Avatars'),
        ]
    );
    return redirect()->back();
});

Route::get('jabatan', function(){
    return view('admin.jabatan', ['jabatan' => DB::table('jabatan')->get() ]);
});

Route::get('/karyawan/buat', [KaryawanController::class, 'create']);
Route::post('/karyawan', [KaryawanController::class, 'store']);
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
Route::get('/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit']);
Route::post('/karyawan/absen', [KaryawanController::class, 'absen']);