<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('jenjang_pendidikan', 'JenjangController@index')->name('jenjang_pendidikan');
});

Route::group(['as' => 'staff.', 'prefix' => 'staff', 'namespace' => 'Staff', 'middleware' => ['auth', 'staff']], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
