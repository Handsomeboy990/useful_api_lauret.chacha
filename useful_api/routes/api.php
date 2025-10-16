<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Middleware\CheckModuleActive;
use App\Http\Controllers\UserModuleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

/* Route::get('/modules', [ModuleController::class, 'index'])
    ->middleware('auth')
    ->name('modules'); */


Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/modules', [ModuleController::class, 'index']);
  Route::post('/modules/{id}/activate', [UserModuleController::class, 'activate']);
  Route::post('/modules/{id}/desactivate', [UserModuleController::class, 'desactivate']);
});


