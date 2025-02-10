<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;


Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('locale/{lang}', [LocaleController::class, 'setLocale'])->name('locale.setLocale');
Route::prefix('cars')->group(function () {
    Route::get('/{car}', [CarController::class, 'show'])->name('cars.show');

});

Route::group([
    'middleware' => 'is_guest'
], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/login_proceed', [AuthController::class, 'login'])->name('login_proceed');
    Route::post('/register_proceed', [AuthController::class, 'register'])->name('register_proceed');
});


Route::group([
    'middleware' => 'is_logged_in',
], function () {
    Route::get('cars/{car}/rent', [CarController::class, 'rent'])->name('cars.rent');
    Route::post('cars/{car}/rent_proceed', [CarController::class, 'rent_proceed'])->name('cars.rent_proceed');
    Route::get('cars/{car}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('cars/{car}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/profiles/{user}', [UserController::class, 'show'])->name('profile.show');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::group([
    'middleware' => 'is_admin',
    'prefix' => 'admin',
], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/cars', [AdminController::class, 'cars'])->name('cars');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/rents', [AdminController::class, 'rents'])->name('rents');
    Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews');

        Route::group([
            'prefix' => 'cars',
            'as' => 'cars.'
        ], function () {
            Route::get('/create', [CarController::class, 'create'])->name('create');
            Route::post('/store', [CarController::class, 'store'])->name('store');
            Route::post('/{car}/update', [CarController::class, 'update'])->name('update');
            Route::get('/{car}/delete', [CarController::class, 'destroy'])->name('destroy');
            Route::get('/{car}/edit', [CarController::class, 'edit'])->name('edit');
            Route::get('/{car}/release', [CarController::class, 'release'])->name('release');
        });
        Route::prefix('rents')->group(function () {
            Route::get('/{rent}/edit', [RentController::class, 'edit'])->name('rents.edit');
            Route::post('/{rent}/update', [RentController::class, 'update'])->name('rents.update');
            Route::post('/price', [RentController::class, 'price'])->name('rent.price');
        });
        Route::get('/reviews/{review}/delete', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    });







