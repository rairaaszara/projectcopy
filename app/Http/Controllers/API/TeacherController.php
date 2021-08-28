<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCollection;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\ApiResponse;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
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
        $teacher = Teacher::all();
        return Teacher::all();
        try {
            $data    = new TeacherCollection(Teacher::with('studentClass')->get());
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
        $teacher = new Teacher;
        $teacher->nama_guru = $request->nama_guru;
        $teacher->alamat = $request->alamat;
        $teacher->save();

        try {
            $data    = new TeacherCollection(Teacher::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return $teacher;
        try {
            $data    = new TeacherResource($teacher);
            return ApiResponse::success(self::SHOW_MESSAGE, $data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return ApiResponse::error($th->getMessage(),$th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required',
            'alamat' => 'required'
        ]);

         $nama_guru = $request->nama_guru;
         $alamat = $request->alamat;

         $teacher = Teacher::find($id);
         $teacher->nama_guru = $nama_guru;
         $teacher->alamat = $alamat;
         $teacher->save();

         try {
            $data    = new TeacherCollection(Teacher::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {

        Teacher::destroy($teacher->id);

        try {
            $data    = new TeacherCollection(Teacher::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }
    }
}
