<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobCardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AutoLogout;
use Illuminate\Support\Facades\Route;

// Routes for authentication
Route::get('/', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//auto Logout
Route::middleware([AutoLogout::class])->group(function () {

    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('/edit/{id}',[ProfileController::class,'index'])->name('edit');
        Route::put('/update/{id}',[ProfileController::class,'update'])->name('update');
    });

    // Admin 
    Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'as' => 'admin.'], function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard'); 

        Route::prefix('jobcard')->group(function () {
            Route::get('/', [JobCardController::class, 'index'])->name('jobcard');
            Route::get('/add', [JobCardController::class, 'add'])->name('jobcard.add');
            Route::post('/store', [JobCardController::class, 'store'])->name('jobcard.store');
            Route::get('/edit/{id}', [JobCardController::class, 'edit'])->name('jobcard.edit');
            Route::get('/show/{id}', [JobCardController::class, 'show'])->name('jobcard.show');
            Route::put('/update', [JobCardController::class, 'update'])->name('jobcard.update');
            Route::get('/print', [JobCardController::class, 'print'])->name('jobcard.print');
            Route::delete('/delete', [JobCardController::class, 'destroy'])->name('jobcard.destroy');
        });
        

    });

    //Pegawai
    Route::group(['prefix' => 'pegawai', 'middleware' => ['pegawai'], 'as' => 'pegawai.'], function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'pegawai'])->name('dashboard'); 
        
    });
    
});