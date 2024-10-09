<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ErrandApplicationController;
use App\Http\Controllers\ErrandController;
use App\Http\Controllers\MyErrandApplicationController;
use App\Http\Controllers\MyErrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Guest routes
// Guest routes
Route::get('', fn()=> to_route('errands.index'));
Route::match(['get', 'post'], 'auth/create', [AuthController::class, 'create'])->name('auth.create');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// Authenticated routes
Route::middleware('auth')->group(function() {
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::delete('auth', [AuthController::class,'logout'])
    ->name('auth.destroy');
    

    // Errands
    Route::resource('errands', ErrandController::class)
        ->only(['index', 'show']);

    // Errand Applications
    Route::resource('errands.application', ErrandApplicationController::class)
        ->only(['create','store']);

    // My Errand Applications
    Route::resource('my-errand-applications', MyErrandApplicationController::class)
        ->only(['index','destroy']);

    // Customers
    Route::resource('customer', CustomerController::class)
        ->only('create','store');

    // My Errands
    Route::resource('my-errands', MyErrandController::class)->names([
        'index'=>'my-errands.index',
        'show'=>'my-errands.show',
        'edit'=>'my-errands.edit',
        'update'=>'my-errands.update',
        'destroy'=>'my-errands.destroy'
    ]);

    // Reports
    Route::resource('reports', ReportController::class)->names([
        'index' => 'reports.index',
        'show' => 'reports.show',
        'errandsApplied' => 'reports.errands_applied',
    ]);
});