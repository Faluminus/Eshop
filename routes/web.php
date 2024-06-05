<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function (){
    Route::get('/dashboard', [HomeController::class,'redirect'])->name('dashboard');
});

Route::post('/uploadproduct', [AdminController::class,'uploadproduct']);
Route::get('/deleteproduct/{id}', [AdminController::class,'deleteproduct']);
Route::get('/updateview/{id}', [AdminController::class,'updateview']);
Route::post('/updateproduct/{id}', [AdminController::class,'updateproduct']);
Route::post('/addcart/{id}', [HomeController::class,'addcart']);
Route::post('/removecart/{id}', [HomeController::class,'removecart']);
Route::post('/cleancart', [HomeController::class,'cleancart']);



