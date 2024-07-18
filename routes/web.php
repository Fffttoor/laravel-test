<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::group(['prefix'=>'/admin'] , function (){
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
        Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
        Route::post('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


        Route::post('/companies/store', [AdminController::class, 'store'])->name('companies.store');
        Route::post('/companies/{id}/edit', [AdminController::class, 'edit'])->name('companies.edit');
        Route::put('/companies/update/{id}', [AdminController::class, 'update'])->name('companies.update');
        Route::delete('/companies/{id}', [AdminController::class, 'destroy'])->name('companies.destroy');
    });

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
