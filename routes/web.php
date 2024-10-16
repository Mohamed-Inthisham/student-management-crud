<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'getStudents'])->name('getStudents.index');
Route::get('/students/create', [StudentController::class, 'createStudent'])->name('createStudent.index');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
Route::get('/students/{student}/edit', [StudentController::class, 'editStudent'])->name('student.edit');
Route::put('/students/{student}/update', [StudentController::class, 'updateStudent'])->name('student.update');
Route::delete('/students/{student}/delete', [StudentController::class, 'destroyStudent'])->name('student.destroy');
