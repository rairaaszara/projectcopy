<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\MajorController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kelas', [KelasController::class, 'index']);
Route::apiResource('kelas', KelasController::class);

//routes guru
Route::get('guru', [GuruController::class, 'index']);
Route::get('/guru/{id}', '\App\Http\Controllers\GuruController@show');
Route::delete('/guru/{id}', '\App\Http\Controllers\GuruController@delete');


//routes jurusan
Route::get('jurusan', [JurusanController::class, 'index']);
Route::apiResource('jurusan', JurusanController::class);


//routes siswa
Route::get('siswa', [SiswaController::class, 'index']);
Route::get('/siswa/{id}', '\App\Http\Controllers\SiswaController@create');
Route::get('/siswa/{id}', '\App\Http\Controllers\SiswaController@update');
Route::delete('/siswa/{id}', '\App\Http\Controllers\SiswaController@delete');


//routes
Route::apiResource('students', StudentController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('majors', MajorController::class);
Route::apiResource('student-classes', StudentClassController::class);

//route teacher
Route::get('teachers', [TeacherController::class, 'index']);
Route::post('teachers', [TeacherController::class, 'store']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy']);

//route major
Route::get('majors', [MajorController::class, 'index']);
Route::post('majors', [MajorController::class, 'store']);
Route::put('/majors/{id}', [MajorController::class, 'update']);
Route::delete('/majors/{major}', [MajorController::class, 'destroy']);

//route student
Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{student}', [StudentController::class, 'destroy']);

//route student class
Route::get('student_classes', [StudentClassController::class, 'index']);
Route::post('student_classes', [StudentClassController::class, 'store']);
Route::put('/student_classes/{id}', [StudentClassController::class, 'update']);
Route::delete('/student_classes/{studentClass}', [StudentClassController::class, 'destroy']);

//route ajax
Route::get('/users', 'AjaxController@index');
Route::get('/getData/{id}','AjaxController@getData');


Route::apiResource('projects', ProjectController::class)->middleware('auth:api'); 