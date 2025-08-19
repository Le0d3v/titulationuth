<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebServicesController;
use Illuminate\Support\Facades\Route;

// Admin
Route::get('/dashboard', [AdminController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Student
Route::middleware('auth')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/my-process', [UserController::class, 'myProcess'])->name('my-process');
    Route::get('/data-validation', [UserController::class, 'dataValidation'])->name('dataValidation');
    Route::post('/data-validation', [UserController::class, 'dataValidationStore'])->name('dataValidation.store');
    Route::get('/my-files', [UserController::class, 'myFiles'])->name('myFiles');
    Route::post('/my-files/image-titulation-upload', [UserController::class, 'imageStore'])->name('image.store');
    Route::post('/my-files/image-donation-upload', [UserController::class, 'imageDonationStore'])->name('imageDonation.store');
    Route::post('/my-files/image-tittle-upload', [UserController::class, 'imageTittleStore'])->name('imageTittle.store');
});

// Admin
Route::middleware("auth")->group(function() {
    Route::get("/students-tsu", [StudentController::class, "index"])->name("students");
    Route::get("/students-ing", [StudentController::class, "showEngeniers"])->name("students.ing");
    Route::get("/processes", [ProcessController::class, "index"])->name("processes");
});


// Files Donwloads
Route::get('/my-files/download-image/{id}', [FilesController::class, 'downloadImg'])->name('image.donwload');

// APIs
Route::get('/api/get-users', [WebServicesController::class, 'getStudents'])->name('api.getUsers');
Route::get('/api/get-user/{id}', [WebServicesController::class, 'getStudent'])->name('api.getUser');
Route::get('/api/get-dataschools', [WebServicesController::class, 'getDataSchools'])->name('api.getDatSchools');
Route::get('/api/get-dataschool/{id}', [WebServicesController::class, 'getDataSchool'])->name('api.getDatSchool');
Route::get('/api/get-processes', [WebServicesController::class, 'getProcesses'])->name('api.getProcesses');
Route::get('/api/get-process/{id}', [WebServicesController::class, 'getProcess'])->name('api.getProcess');
Route::get('/api/get-dataschool/{id}', [WebServicesController::class, 'getDataSchool'])->name('api.getDatSchool');
Route::get('/api/dataschools/{id}', [StudentController::class, 'showData'])->name('dataschools.show');

require __DIR__.'/auth.php';
