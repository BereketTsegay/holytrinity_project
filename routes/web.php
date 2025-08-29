<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'index']);
    Route::controller(RoleController::class)->group(function () {
        Route::get('/role/{id}', 'show');
        Route::get('/roles', 'index')->name('admin.roles');
        Route::post('/roles', 'store');
        Route::delete('/roles', 'delete');
    });

})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
