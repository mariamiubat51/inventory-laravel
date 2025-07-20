<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionLogController;
use App\Http\Controllers\PurchaseController;




Route::resource('products', ProductController::class);

Route::resource('suppliers', SupplierController::class);

Route::resource('accounts', AccountController::class);

Route::resource('transaction_logs', TransactionLogController::class)
    ->only(['index', 'create', 'store']);

Route::resource('purchases', PurchaseController::class);




// Homepage redirect logic
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Profile routes (for all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});


// Auth (login, register, logout)
require __DIR__ . '/auth.php';
