<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Web" middleware group. Enjoy building your API!
|
*/

//routes guru
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/getData/{id}', [GuruController::class, 'getData']);

//routes jurusan
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::get('/getData/{id}', [JurusanController::class, 'getData']);

//routes kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/getData/{id}', [KelasController::class, 'getData']);

//routes siswa
Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/getData/{id}', [SiswaController::class, 'getData']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('register', [GuruController::class, 'register']);
// Route::post('login', [GuruController::class, 'login']);
// Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);

Route::apiResource('projects', GuruController::class)->middleware('auth:api');