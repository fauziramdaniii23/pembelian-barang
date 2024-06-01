<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'index']);


Route::middleware('guest')->group(function(){
    Route::get('/login', [authController::class, 'index'])->name('login');
    Route::post('/loginAttempt', [authController::class, 'login'])->name('loginAttempt');
    Route::get('/Registrasi', [authController::class, 'showRegister'])->name('register');
    Route::post('/Registrasi', [authController::class, 'register'])->name('register.create');
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
    
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
});
Route::middleware('auth', 'role:admin')->group(function(){
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
});
Route::middleware('auth', 'role:user')->group(function(){
});
