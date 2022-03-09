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
// Route::view('/apartments', 'apartments.index')->name('apartments.index');
// Route::view('/apartments/create', 'apartments.create')->name('apartments.create');
Route::get('/apartements/historic/{id}', "App\Http\Controllers\ApartementController@historic")->name('apartements.historic');
// Route::view('/apartements/show', 'apartements.show')->name('apartements.show');
// Route::view('/users/create', 'users.create')->name('users.create');
Route::resource('/users',"App\Http\Controllers\UserController")->middleware('auth');
Route::resource('/apartements',"App\Http\Controllers\ApartementController")->middleware('auth');
Route::put('/apartements/updateconsigne/{id}',[App\Http\Controllers\ApartementController::class, 'updateconsigne'])->name('apartements.updateconsigne');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
