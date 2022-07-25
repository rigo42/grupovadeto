<?php

use App\Http\Controllers\Admin\Dashboard\General\GeneralController as DashboardGeneralController;
use App\Http\Controllers\Admin\Matter\MatterController;
use App\Http\Controllers\Admin\Qualification\QualificationController;
use App\Http\Controllers\Admin\Student\StudentController;
use Illuminate\Support\Facades\Route;

//Dashboard
Route::prefix('/')->name('dashboard.')->group(function (){
    Route::get('/', [DashboardGeneralController::class, 'index'])->name('general.index');
});
//Matter
Route::middleware(['can:materias'])->get('/matter', [MatterController::class, 'index'])->name('matter.index');
//Student
Route::middleware(['can:estudiantes'])->get('/student', [StudentController::class, 'index'])->name('student.index');
//Qualification
Route::middleware(['can:calificaciones'])->get('/qualification', [QualificationController::class, 'index'])->name('qualification.index');