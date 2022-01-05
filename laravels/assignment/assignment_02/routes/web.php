<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index']);
Route::get('students', [StudentController::class, 'index']);
Route::get('add-student', [StudentController::class, 'create']);
Route::post('add-student', [StudentController::class, 'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);
//export pdf
Route::get('/exportpdf', [StudentController::class, 'exportpdf'])->name('exportpdf');
//export excel
Route::get('/exportexcel', [StudentController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [StudentController::class, 'importexcel'])->name('importexcel');
Route::get('/exportcsv', [StudentController::class, 'exportcsv'])->name('exportcsv');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
