<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware("auth")->group(function() {
    Route::get("/students-tsu", [StudentController::class, "index"])->name("students");
    Route::get("/students-ing", [StudentController::class, "showEngeniers"])->name("students.ing");

});

Route::middleware("auth")->group(function() {
    Route::get("/processes", [ProcessController::class, "index"])->name("processes");
});


// API's
Route::get('/dataschools/{id}', [StudentController::class, 'showData'])->name('dataschools.show');

require __DIR__.'/auth.php';
