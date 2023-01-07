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
Route::get('/login',[\App\Http\Controllers\Auth\LoginController::class,'getLogin'])->name('login');
Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class,'postLogin']);


Route::get('/register', [\App\Http\Controllers\Auth\LoginController::class, 'getFormRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\LoginController::class, 'postFormRegister'])->name('post_register');

Route::prefix('products')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('screens.product.index');
    Route::get('/create/{type?}', [\App\Http\Controllers\ProductController::class, 'create'])->name('screens.product.create');
    Route::post('/create/{type?}', [\App\Http\Controllers\ProductController::class, 'store'])->name('screens.product.store');

});
