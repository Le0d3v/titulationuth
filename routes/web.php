<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\PDFController;
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
    Route::post('/my-files/payment-tittle-reference', [UserController::class, 'referenceStore'])->name('reference.store');
    Route::get('/donwload-letter/{id}', [PDFController::class, 'generatePDF'])->name('letter.donwload');
});

// Admin
Route::middleware("auth")->group(function() {
    Route::get("/students-tsu", [StudentController::class, "index"])->name("students");
    Route::get("/students-ing", [StudentController::class, "showEngeniers"])->name(name: "students.ing");
    Route::get("/processes", [ProcessController::class, "index"])->name("processes");
    Route::get("/processes/show/{id}", [ProcessController::class, "show"])->name("processes.show");
    Route::get("/processes/show/{id}", [ProcessController::class, "show"])->name("processes.show");
    Route::get("/students/show-data/{id}", [AdminController::class, "showStudent"])->name("student.show");

    // Process (image)
    Route::get("/process/accept-image/{id}", [ProcessController::class, "aceptImage"])->name("process.aceptImage");
    Route::get("/process/reject-image/{id}", [ProcessController::class, "rejectImage"])->name("process.rejectImage");
    Route::post("/process/coment-image", [ProcessController::class, "comentImage"])->name("process.comentImage");

    // Process (donation)
    Route::get("/process/accept-donation/{id}", [ProcessController::class, "aceptDonation"])->name("process.aceptDonation");
    Route::get("/process/reject-donation/{id}", [ProcessController::class, "rejectDonation"])->name("process.rejectDonation");
    Route::post("/process/coment-donation", [ProcessController::class, "comentDonation"])->name("process.comentDonation");

    // Process (tittle)
    Route::get("/process/accept-tittle/{id}", [ProcessController::class, "aceptTittle"])->name("process.aceptTittle");
    Route::get("/process/reject-tittle/{id}", [ProcessController::class, "rejectTittle"])->name("process.rejectTittle");
    Route::post("/process/coment-tittle", [ProcessController::class, "comentTittle"])->name("process.comentTittle");

});

// Files
Route::post('/files/image-titulation-upload', [UserController::class, 'imageStore'])->name('image.store');
Route::get('/files/download-image/{id}', [FilesController::class, 'downloadImg'])->name('image.donwload');
Route::post('/files/upload-pdf', [FilesController::class, 'pdfStore'])->name('pdf.store');
Route::get('/files/download-pdf/{id}', [FilesController::class, 'downloadPDF'])->name('pdf.donwload');

// APIs
Route::get('/api/get-users', [WebServicesController::class, 'getStudents'])->name('api.getUsers');
Route::get('/api/get-user/{id}', [WebServicesController::class, 'getStudent'])->name('api.getUser');
Route::get('/api/get-dataschools', [WebServicesController::class, 'getDataSchools'])->name('api.getDatSchools');
Route::get('/api/get-dataschool/{id}', [WebServicesController::class, 'getDataSchool'])->name('api.getDatSchool');
Route::get('/api/get-processes', [WebServicesController::class, 'getProcesses'])->name('api.getProcesses');
Route::get('/api/get-process/{id}', [WebServicesController::class, 'getProcess'])->name('api.getProcess');
Route::get('/api/get-dataschool/{id}', [WebServicesController::class, 'getDataSchool'])->name('api.getDatSchool');
Route::get('/api/dataschools/{id}', [StudentController::class, 'showData'])->name('dataschools.show');
Route::get('/api/get-pdf/{id}', [WebServicesController::class, 'getPDF'])->name('pdf.get');
Route::get('/api/get-image/{id}', [WebServicesController::class, 'getImage'])->name('image.get');

require __DIR__.'/auth.php';
