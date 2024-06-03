<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function (){
    Route::get('/dashboard', [HomeController::class,'redirect'])->name('dashboard');
});

Route::post('/uploadproduct', [AdminController::class,'uploadproduct']);



