<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});
// Route::view('/auth', 'auth.register')->name('users.index');
// Route::view('/users', 'users.index')->name('users.index');
Route::view('/apartments', 'apartments.index')->name('apartments.index');
Route::view('/apartments/create', 'apartments.create')->name('apartments.create');
Route::view('/apartments/historic', 'apartments.historic')->name('apartments.historic');
Route::view('/apartments/show', 'apartments.show')->name('apartments.show');
// Route::view('/users/create', 'users.create')->name('users.create');
Route::resource('/users',"App\Http\Controllers\UserController");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
