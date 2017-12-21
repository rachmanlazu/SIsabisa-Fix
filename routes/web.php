<?php

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

// First Route method – Root URL will match this method
//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', function () {
    return view('templates.loginadmin');
});

Route::get('/loginme', function () {
    return view('beranda');
});

Route::get('/beranda', function () {
    $active = 'dashboard';
    $role = Auth::user()->role;
    return view('templates.isi-dashboard', compact('active','role'));
});

// Route::get('/index', function () {
//     $active = 'dashboard';
//
//     return view('templates.isi-dashboard', compact('active'));
// });

Route::get('/beranda', 'DashboardController@index');

//Route::get('/coba', function () {
   // $active = 'dashboard';
   // $role = Auth::user()->role;

   // return view('templates.isi-dashboard', compact('active','role'));


// Route::get('/test', function () {
//     return view('templates.tambahkaryawan');
// });

Route::resource('sisabisa', 'SabisaController', ['names' => ['index' => 'sisabisa.index']]);

//Route::Post('/pengunjung/create', 'PengunjungController@store')->name('pengunjung.store');
Route::resource('pengunjung', 'PengunjungController', ['names' => ['index' => 'pengunjung.index']]);


Route::get('histori-stok/{id}', 'HistoriController@show');
Route::resource('histori-stok', 'HistoriController', ['names' => ['index' => 'histori-stok.index']]);

Route::resource('karyawan', 'DashboardController', ['names' => ['edit' => 'karyawan.edit']]);
Route::get('/daftar-karyawan', 'DashboardController@show')->name('daftar-karyawan.show');
Route::get('/tambah-karyawan', 'DashboardController@post')->name('post.pekerja');
// Route::get('/tambah-barang', 'BarangController@post')->name('post.barang');
Route::post('/tambah-karyawan', 'TambahUserController@karyawan')->name('tambahuser.karyawan');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', 'HomeController@index');
