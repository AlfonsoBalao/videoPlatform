<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


//Non-authenticated routes
Route::get('/', [DashboardController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () { //Authenticated routes
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
