<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentClassCollection;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\ApiResponse;
use App\Http\Resources\StudentClassResource;

class StudentClassController extends Controller
{
    protected const INDEX_MESSAGE   = 'Succes mengambil semua data mode guru';
    protected const SHOW_MESSAGE    = 'Succes mengambil data mode guru berdasarakan primary key nya';
    protected const STORE_MESSAGE   = 'Succes mengambil semua data mode guru';
    protected const UPDATE_MESSAGE  = 'Succes mengambil semua data mode guru';
    protected const DESTROY_MESSAGE = 'Succes mengambil semua data mode guru';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentClass::all();

        try {
            $data    = new StudentClassCollection(StudentClass::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentClass = new StudentClass();
        $studentClass->nama_kelas = $request->nama_kelas;
        $studentClass->save();

               
        try {
            $data    = new StudentClassCollection(StudentClass::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

         $nama_kelas = $request->nama_kelas;

         $studentClass = StudentClass::find($id);
         $studentClass->nama_kelas = $nama_kelas;
         $studentClass->save();

         
        try {
            $data    = new StudentClassCollection(StudentClass::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $studentClass)
    {
       StudentClass::destroy($studentClass->id);

        
       try {
        $data    = new StudentClassCollection(StudentClass::with('studentClass')->get());
        return ApiResponse::success(self::INDEX_MESSAGE, $data);
    } catch (\Throwable $th) {
        return ApiResponse::error($th->getMessage(), $th);
    }
    }
}
