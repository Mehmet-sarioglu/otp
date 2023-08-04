<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->middleware('auth');

Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');

Route::get('/login',[\App\Http\Controllers\AuthController::class,'index'])->middleware('guest');
Route::get('/logout', [\App\Http\Controllers\AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::post('/userEdit',[\App\Http\Controllers\HomeController::class,'nameEdit'])->middleware('auth');
