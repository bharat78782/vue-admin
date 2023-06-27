<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('updateProfile', [RegisterController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/user-list', [DashboardController::class, 'userList'])->name('user-list');
    Route::get('/user-delete/{id}', [DashboardController::class, 'user_delete'])->name('user-delete');
    Route::get('/edit-user/{id}', [DashboardController::class, 'edit_user'])->name('edit-user');
    Route::post('update-user', [DashboardController::class, 'update_user'])->name('update-user');
    
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [RegisterController::class, 'login'])->name('login');


