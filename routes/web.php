<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
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

// Patient Routes
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');



//Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
//Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
//Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
//Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
//Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
//Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');


Route::resource('appointments', AppointmentController::class);
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
