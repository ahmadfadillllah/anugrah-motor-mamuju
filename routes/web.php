<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CariBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SatuanBarangController;
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

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/',[HomeController::class, 'index'])->name('home.index');
Route::get('/show/{id}',[HomeController::class, 'show'])->name('home.show');
Route::post('/search_inventory',[HomeController::class, 'search'])->name('home.search');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login/post',[AuthController::class, 'login_post'])->name('login.post');

// Route::get('/register',[AuthController::class, 'register'])->name('register');
// Route::post('/register/post',[AuthController::class, 'register_post'])->name('register.post');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/dashboard/index',[DashboardController::class, 'index'])->name('dashboard.index');

    Route::post('/cari_barang',[CariBarangController::class, 'index'])->name('caribarang.index');

    Route::get('/jenis_barang',[JenisBarangController::class, 'index'])->name('jenisbarang.index');
    Route::get('/jenis_barang/show/{id}',[JenisBarangController::class, 'show'])->name('jenisbarang.show');
    Route::post('/jenis_barang/insert',[JenisBarangController::class, 'insert'])->name('jenisbarang.insert');
    Route::post('/jenis_barang/update/{id}',[JenisBarangController::class, 'update'])->name('jenisbarang.update');
    Route::get('/jenis_barang/destroy/{id}',[JenisBarangController::class, 'destroy'])->name('jenisbarang.destroy');

    Route::get('/satuan_barang',[SatuanBarangController::class, 'index'])->name('satuanbarang.index');
    Route::post('/satuan_barang/insert',[SatuanBarangController::class, 'insert'])->name('satuanbarang.insert');
    Route::post('/satuan_barang/update/{id}',[SatuanBarangController::class, 'update'])->name('satuanbarang.update');
    Route::get('/satuan_barang/destroy/{id}',[SatuanBarangController::class, 'destroy'])->name('satuanbarang.destroy');

    Route::get('/data_user',[DataUserController::class, 'index'])->name('datauser.index');
    Route::get('/data_user/destroy/{id}',[DataUserController::class, 'destroy'])->name('datauser.destroy');

    Route::get('/data_barang',[DataBarangController::class, 'index'])->name('databarang.index');
    Route::get('/data_barang/tambah',[DataBarangController::class, 'tambah'])->name('databarang.tambah');
    Route::post('/data_barang/insert',[DataBarangController::class, 'insert'])->name('databarang.insert');
    Route::get('/data_barang/edit/{id}',[DataBarangController::class, 'edit'])->name('databarang.edit');
    Route::post('/data_barang/update/{id}',[DataBarangController::class, 'update'])->name('databarang.update');
    Route::get('/data_barang/destroy/{id}',[DataBarangController::class, 'destroy'])->name('databarang.destroy');

    Route::get('/barang_masuk',[BarangMasukController::class, 'index'])->name('barangmasuk.index');
    Route::get('/barang_masuk/tambah',[BarangMasukController::class, 'tambah'])->name('barangmasuk.tambah');
    Route::post('/barang_masuk/insert',[BarangMasukController::class, 'insert'])->name('barangmasuk.insert');
    Route::get('/barang_masuk/show',[BarangMasukController::class, 'show_data'])->name('barangmasuk.show');
    Route::get('/barang_masuk/destroy/{id}',[BarangMasukController::class, 'destroy'])->name('barangmasuk.destroy');

    Route::get('/barang_keluar',[BarangKeluarController::class, 'index'])->name('barangkeluar.index');
    Route::get('/barang_keluar/tambah',[BarangKeluarController::class, 'tambah'])->name('barangkeluar.tambah');
    Route::post('/barang_keluar/insert',[BarangKeluarController::class, 'insert'])->name('barangkeluar.insert');
    Route::get('/barang_keluar/show',[BarangKeluarController::class, 'show_data'])->name('barangkeluar.show');
    Route::get('/barang_keluar/destroy/{id}',[BarangKeluarController::class, 'destroy'])->name('barangkeluar.destroy');

    Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update',[ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change_password',[ProfileController::class, 'change_password'])->name('profile.change_password');
    Route::post('/profile/change_avatar',[ProfileController::class, 'change_avatar'])->name('profile.change_avatar');

});
