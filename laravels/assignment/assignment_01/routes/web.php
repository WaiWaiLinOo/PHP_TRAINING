<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
//Api for 
Route::get('fetch-students', [StudentApiController::class, 'fetchstudent']);
Route::get('/', [StudentController::class, 'index']);
Route::get('students', [StudentController::class, 'index']);
Route::get('add-student', [StudentController::class, 'create']);
Route::post('add-student', [StudentController::class, 'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);
//for mail 
Route::get('/mail', [StudentController::class, 'showMailForm'])->name('showMailForm');
Route::post('/mail', [StudentController::class, 'postMailForm'])->name('postMailForm');
//export pdf
Route::get('/export-pdf', [StudentController::class, 'exportPdf'])->name('exportpdf');
//export excel
Route::get('/export-excel', [StudentController::class, 'exportExcel'])->name('exportexcel');
Route::post('/import-excel', [StudentController::class, 'importExcel'])->name('importexcel');
Route::get('/export-csv', [StudentController::class, 'exportCsv'])->name('exportcsv');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
