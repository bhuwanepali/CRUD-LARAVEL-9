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
    return view('auth.login');
});

Auth::routes();

Route::post('/home', [App\Http\Controllers\ClientController::class, 'home'])->name('home');
Route::post('/store', [App\Http\Controllers\ClientController::class, 'store'])->name('client.store');
Route::post('/get_education', [App\Http\Controllers\ClientController::class, 'get_education'])->name('client.get_education');
Route::get('/update', [App\Http\Controllers\ClientController::class, 'update'])->name('client.update');
Route::get('/client/destroy/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('client.destroy');
Route::get('/home', [App\Http\Controllers\ClientController::class, 'index'])->name('home.index');
Route::get('/client/edit/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');
Route::get('/client/view/{id}', [App\Http\Controllers\ClientController::class, 'view'])->name('client.view');
