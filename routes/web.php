<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PelangganController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function(){
    \Auth::logout();
    return redirect ('/home');
});

//TABEL ADMIN
Route::get('admin/add', [AdminController::class, 'create'])
->name('admin.create');
Route::post('admin/store', [AdminController::class, 'store'])
->name('admin.store');
Route::get('admin/', [AdminController::class, 'index'])
->name('admin.index');
Route::get('admin/edit/{id}', [AdminController::class, 'edit'])
->name('admin.edit');
Route::post('admin/update/{id}', [AdminController::class,'update'])
->name('admin.update');
Route::post('admin/delete/{id}', [AdminController::class,'delete'])
->name('admin.delete');
Route::get('admin/softdelete/{id}', [AdminController::class,'softdelete'])
->name('admin.softdelete');

Route::get('admin/search',[AdminController::class,'search'])
->name('admin.search');

//TABEL IKAN
Route::get('ikan/add', [IkanController::class, 'create'])
->name('ikan.create');
Route::post('ikan/store', [IkanController::class, 'store'])
->name('ikan.store');
Route::get('ikan/', [IkanController::class, 'index'])
->name('ikan.index');
Route::get('ikan/edit/{id}', [IkanController::class, 'edit'])
->name('ikan.edit');
Route::post('ikan/update/{id}', [IkanController::class,'update'])
->name('ikan.update');
Route::post('ikan/delete/{id}', [IkanController::class,'delete'])
->name('ikan.delete');
Route::get('ikan/softdelete/{id}', [IkanController::class,'softdelete'])
->name('ikan.softdelete');

//TABEL GROUP
Route::get('gabung/', [GroupController::class, 'gabung'])
->name('gabung.index');

//TABEL PELANGGAN
Route::get('pelanggan/add', [PelangganController::class, 'create'])
->name('pelanggan.create');
Route::post('pelanggan/store', [PelangganController::class, 'store'])
->name('pelanggan.store');
Route::get('pelanggan/', [PelangganController::class, 'index'])
->name('pelanggan.index');
Route::get('pelanggan/edit/{id}', [PelangganController::class, 'edit'])
->name('pelanggan.edit');
Route::post('pelanggan/update/{id}', [PelangganController::class,'update'])
->name('pelanggan.update');
Route::post('pelanggan/delete/{id}', [PelangganController::class,'delete'])
->name('pelanggan.delete');
Route::get('pelanggan/softdelete/{id}', [PelangganController::class,'softdelete'])
->name('pelanggan.softdelete');


