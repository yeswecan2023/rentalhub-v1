<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/home', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/products/store', [ProductController::class, 'store'])->middleware('auth');
Route::get('/products/{id}/show', [ProductController::class, 'show'])->middleware('auth');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->middleware('auth');
Route::get('/products/{id}/delete', [ProductController::class, 'destroy'])->middleware('auth');
Route::view('register', 'auth.register')->middleware('guest');
Route::post('/store', [RegisterController::class, 'store']);
Route::view('login', 'auth.login')->middleware('guest')->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
