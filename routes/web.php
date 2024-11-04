<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrandStatusController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ErrandApplicationController;
use App\Http\Controllers\ErrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyErrandApplicationController;
use App\Http\Controllers\MyErrandController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;

// Guest routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('auth/create', [AuthController::class, 'create'])->name('auth.create');
Route::post('auth/store', [AuthController::class, 'store'])->name('auth.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('password/reset', [PasswordResetController::class, 'showResetRequestForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.update');

// Authenticated routes
Route::middleware('auth')->group(function() {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('auth', [AuthController::class, 'logout'])->name('auth.destroy');

    // Errands
    Route::resource('errands', ErrandController::class)->only(['index', 'show']);
    Route::post('/errands/{errand}/status', [ErrandController::class, 'updateStatus'])->name('errands.updateStatus');
    // Errand Applications
    Route::resource('errands.application', ErrandApplicationController::class)->only(['create', 'store']);

    // My Errand Applications
    Route::resource('my-errand-applications', MyErrandApplicationController::class)->only(['index', 'destroy']);
    Route::get('/my-errand-applications/{application}/status', [MyErrandApplicationController::class, 'status'])->name('my-errand-applications.status');
    Route::patch('/my-errand-applications/{application}/update-status', [MyErrandApplicationController::class, 'updateStatus'])->name('my-errand-applications.update-status');

    // Customers
    Route::resource('customer', CustomerController::class)->only(['create', 'store']);

    // My Errands
    Route::resource('my-errands', MyErrandController::class)->names([
        'index' => 'my-errands.index',
        'show' => 'my-errands.show',
        'edit' => 'my-errands.edit',
        'update' => 'my-errands.update',
        'destroy' => 'my-errands.destroy'
    ]);
    Route::get('/errand-applications/report', [ErrandStatusController::class, 'report'])->name('my-errand-applications.report');
    Route::get('/my-errand-applications/download', [ErrandApplicationController::class, 'download'])->name('my-errand-applications.download');
  
});