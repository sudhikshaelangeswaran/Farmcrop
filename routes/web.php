<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::controller(LoginController::class)->group(function(){
    Route::get('/register', 'register')->name('register');
    Route::post('/register/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate' , 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

// Admin Routes
Route::middleware(['auth','user-access:Admin'])->group(function(){
    Route::prefix('admin')->group(function() {
        Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('Admin.dashboard');
    });
});

// Customer Routes
Route::middleware(['auth','user-access:customer'])->group(function(){
    Route::prefix('customer')->group(function() {
        Route::get('/dashboard', [HomeController::class, 'customerDashboard'])->name('customer.dashboard');
    });
});

// Farmers Routes
Route::middleware(['auth','user-access:farmer'])->group(function(){
    Route::prefix('farmer')->group(function() {
        Route::get('/dashboard', [HomeController::class, 'farmerDashboard'])->name('farmer.dashboard');
    });
});
