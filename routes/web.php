<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;


Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::prefix('cars')->group(function () {
    Route::get('/{car}', [CarController::class, 'show'])->name('cars.show');
    Route::get('/{car}/rent', [CarController::class, 'rent'])->name('cars.rent');
    Route::post('/{car}/rent_proceed', [CarController::class, 'rent_proceed'])->name('cars.rent_proceed');
    Route::get('/{car}/reviews/create', [ReviewController::class, 'create'])
        ->name('reviews.create');
    Route::post('/{car}/reviews', [ReviewController::class, 'store'])
        ->name('reviews.store');
});


Route::prefix('admin')
    ->middleware('is_admin')
    ->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::group([
        'prefix' => 'cars',
        'as' => 'cars.'
    ], function () {
        Route::get('/', [CarController::class, 'table'])->name('table');
        Route::get('/create', [CarController::class, 'create'])->name('create');
        Route::post('/store', [CarController::class, 'store'])->name('store');
        Route::post('/{car}/update', [CarController::class, 'update'])->name('update');
        Route::get('/{car}/delete', [CarController::class, 'destroy'])->name('destroy');
        Route::get('/{car}/edit', [CarController::class, 'edit'])->name('edit');
        Route::get('/{car}/release', [CarController::class, 'release'])->name('release');
    });

    Route::prefix('rents')->group(function () {
        Route::get('/', [RentController::class, 'index'])->name('rents.index');
        Route::get('/edit/{rent}', [RentController::class, 'edit'])->name('rents.edit');
        Route::post('/update/{rent}', [RentController::class, 'update'])->name('rents.update');
        Route::post('/price', [RentController::class, 'price'])->name('rent.price');
    });
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/reviews/{review}/delete', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});


Route::get('/profiles/{user}', [UserController::class, 'show'])->name('profile.show');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login_proceed', [AuthController::class, 'login'])->name('login_proceed');
Route::post('/register_proceed', [AuthController::class, 'register'])->name('register_proceed');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('locale/{lang}', [LocaleController::class, 'setLocale'])->name('locale.setLocale');



