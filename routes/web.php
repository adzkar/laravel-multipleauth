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

use Illuminate\Http\RedirectResponse;

Route::get('hola', 'TestController@register')->name('hola');
Route::get('login', 'TestController@login');

Route::post('register', 'TestController@prosesRegister')->name('register');

Route::get('contoh', function() {
  return redirect('hola');
});
Route::get('cek', 'TestController@cek');
Route::get('logout', 'TestController@logout');

Route::post('loginProses', 'TestController@prosesLogin')->name('login');

Route::get('/', function () {
    return view('welcome');
});

// mahasiswa
Route::get('loginmhs', 'MahasiswaController@loginMhs');
Route::post('loginmhs', 'MahasiswaController@prosesLogin')->name('loginmhs');
Route::get('registermhs', 'MahasiswaController@register');
Route::post('registermhs', 'MahasiswaController@prosesRegister')->name('registermhs');
Route::get('statusmhs', 'MahasiswaController@status');
Route::get('logoutmhs', 'MahasiswaController@logout');
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
