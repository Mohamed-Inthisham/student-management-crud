<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'getStudents'])->name('getStudents.index');
Route::get('/students/create', [StudentController::class, 'createStudent'])->name('createStudent.index');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
