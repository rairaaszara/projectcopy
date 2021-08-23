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
Route::apiResource('student', StudentController::class);
Route::apiResource('teacher', TeacherController::class);
Route::apiResource('major', MajorController::class);
Route::apiResource('studentClass', StudentClassController::class);

Route::apiResource('projects', ProjectController::class)->middleware('auth:api');