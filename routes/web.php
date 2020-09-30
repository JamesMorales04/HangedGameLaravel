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

Route::get('/', [App\Http\Controllers\viewController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/play', [App\Http\Controllers\PlayController::class, 'index'])->name('play');
Route::get('/lose', [App\Http\Controllers\LoseController::class, 'index'])->name('lose');
Route::get('/win', [App\Http\Controllers\WinController::class, 'index'])->name('win');


Route::post('/play',[App\Http\Controllers\PlayController::class, 'game'] )->name('play');