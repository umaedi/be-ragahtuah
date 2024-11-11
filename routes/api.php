<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route exam show
// Route::get('/exam/{page}', [App\Http\Controllers\Student\ExamController::class, 'show']);

//route exam start
Route::get('/exam-start/{id}', [App\Http\Controllers\Student\ExamController::class, 'startExam'])->name('student.exams.startExam');


Route::get('/exam/{userId}', [App\Http\Controllers\Student\ExamController::class, 'exam'])->name('student.exam');
Route::get('/soal/{page}/{groupId}', [App\Http\Controllers\Student\ExamController::class, 'soal'])->name('student.soal');
Route::post('/answer', [App\Http\Controllers\Student\ExamController::class, 'jawab'])->name('student.answer');