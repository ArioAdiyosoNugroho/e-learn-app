<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* GUEST */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/* AUTH */
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'showHomePage'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi');

    Route::resource('/category', CategoryController::class);

    Route::prefix('materi')->name('materi')->controller(MateriController::class)->group(function () {
        Route::get('/', 'index');

        // Step 1
        Route::get('/create/step1', 'createStep1')->name('.create.step1');
        Route::post('/create/step1', 'storeStep1')->name('.store.step1');

        // Step 2
        Route::get('/create/step2/{materi}', 'createStep2')->name('.create.step2');
        Route::post('/create/step2/{materi}', 'storeStep2')->name('.store.step2');
        // Step 3
        Route::get('/preview/{materi}', 'preview')->name('.preview');
        Route::post('/publish/{materi}', 'publish')->name('.publish');

        // Edit Step 1
        Route::get('/create/step1/{materi}', 'editStep1')->name('.edit.step1');
        Route::put('/create/step1/{materi}', 'updateStep1')->name('.update.step1');

        //publish
        Route::post('/publish/{materi}', 'publish')->name('.publish');
    });

});
