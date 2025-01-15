<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

// Register routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');// Logout route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Home route (after login)
Route::middleware('auth')->get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/billing-list', [InvoiceController::class, 'index'])->name('billing-list');
Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('create-invoice');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::put('/invoice/{id}/update', [InvoiceController::class, 'update'])->name('invoice.update'); // Keep only PUT
Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');

Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
Route::get('/add-doctor', [DoctorController::class, 'create'])->name('doctor.create');
Route::post('/add-doctor', [DoctorController::class, 'store'])->name('doctor.store');
Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
Route::put('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

Route::get('/pharmacy', [DrugController::class, 'index'])->name('pharmacy');
Route::get('/pharmacy/add-drug', [DrugController::class, 'create'])->name('add-drug');
Route::post('/pharmacy/store', [DrugController::class, 'store'])->name('store-drug');
Route::get('/pharmacy/edit-drug/{id}', [DrugController::class, 'edit'])->name('edit-drug');
Route::put('/pharmacy/update/{id}', [DrugController::class, 'update'])->name('update-drug');
Route::delete('/pharmacy/delete/{id}', [DrugController::class, 'destroy'])->name('delete-drug');

Route::get('/medical', [MedicalController::class, 'index'])->name('medical');
Route::get('/view-medical', [MedicalController::class, 'view_more'])->name('medical.view_more');
Route::get('/add-medical', [MedicalController::class, 'create'])->name('medical.create');
Route::post('/view-medical', [MedicalController::class, 'store'])->name('medical.store');
Route::get('/medical/{id}/edit', [MedicalController::class, 'edit'])->name('medical.edit');
Route::put('/medical/{id}', [MedicalController::class, 'update'])->name('medical.update');
Route::delete('/medical/{id}', [MedicalController::class, 'destroy'])->name('medical.destroy');

// Patient Routes
// Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
// Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
// Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
// Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
// Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
// Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');
// <<<<<<< appointment



// //Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
// //Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
// //Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
// //Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
// //Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
// //Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');


// //Route::resource('/appointments', AppointmentController::class);
// //Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
// //Route::get('/appointments/create-appointment', [AppointmentController::class, 'create'])->name('appointments.create');
// //Route::get('appointments/{appointment}', [AppointmentController::class, 'show']);


// Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
// Route::get('/appointments/create-appointment', [AppointmentController::class, 'create'])->name('appointments.create');
// Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
// Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
// =======
// Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');
// >>>>>>> main

//resolved code
Route::resource('appointments', AppointmentController::class);

// Patient Routes
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');
<<<<<<<<< Temporary merge branch 1
Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');
=========



//Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
//Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
//Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
//Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
//Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
//Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');



//Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
//Route::get('appointments/{appointment}', [AppointmentController::class, 'show']);
//Route::get('/appointments/create-appointment', [AppointmentController::class, 'create'])->name('appointments.create');
//Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
//Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
//Route::get('appointments/{appointment}', [AppointmentController::class, 'show']);
//Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');



