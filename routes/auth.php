<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>'guest'],function(){


//register
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store'])->name('store');

//login
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate'])->name('authenticate');


});
//logout
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');
