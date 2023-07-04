<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;


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

   
    // Route::resource('colors',ColorController::class);
    Route::controller(ColorController::class)->group(function () {
        Route::post('/colors/store','store')->name('colors.store');
        Route::get('/colors/index', 'index')->name('colors.index');
        Route::delete('/colors/destroy/{colorId}',  'destroy')->name('colors.destroy');
        Route::get('/colors/edit/{colorId}','edit')->name('colors.edit');
        Route::patch('/colors/update/{colorId}', 'update')->name('colors.update');
    });

    Route::controller(SizeController::class)->group(function () {
        Route::post('/sizes/store','store')->name('sizes.store');
        Route::get('/sizes/index', 'index')->name('sizes.index');
        Route::delete('/sizes/destroy/{colorId}',  'destroy')->name('sizes.destroy');
        Route::get('/sizes/edit/{colorId}','edit')->name('sizes.edit');
        Route::patch('/sizes/update/{colorId}', 'update')->name('sizes.update');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::post('/products/store','store')->name('producst.store');
        Route::get('/products/index', 'index')->name('products.index');
        Route::delete('/products/destroy/{productId}',  'destroy')->name('products.destroy');
        Route::get('/products/edit/{productId}','edit')->name('products.edit');
        Route::patch('/products/update/{productId}', 'update')->name('products.update');
    });
    

    
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [RegisterController::class, 'login'])->name('login');


