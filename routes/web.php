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
//Route::get()
//Route::get('/login',[\App\Http\Controllers\AuthController::class,'getLogin']);
//Route::post('/login',[\App\Http\Controllers\AuthController::class,'postLogin']);



Route::get('/register', [\App\Http\Controllers\Auth\LoginController::class, 'getFormRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\LoginController::class, 'postFormRegister'])->name('post_register');
