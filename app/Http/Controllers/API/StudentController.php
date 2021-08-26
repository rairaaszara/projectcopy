<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentCollection;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\ApiResponse;
use App\Http\Resources\StudentResource;;

class StudentController extends Controller
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
        $student = Student::all();
        return Student::all();
        try {
            $data    = new StudentCollection(Student::with('studentClass')->get());
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
        $student = new Student;
        $student->nama_siswa = $request->nama_siswa;
        $student->alamat = $request->alamat;

        $student->save();
        return "Data Berhasil Ditambahkan";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return $student;
        try {
            $data    = new StudentResource($student);
            return ApiResponse::success(self::SHOW_MESSAGE, $data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return ApiResponse::error($th->getMessage(),$th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'alamat' => 'required'
        ]);

         $nama_siswa = $request->nama_siswa;
         $alamat = $request->alamat;

         $student = Student::find($id);
         $student->nama_siswa = $nama_siswa;
         $student->alamat = $alamat;
         $student->save();

         return "Data Berhasil di Update!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);

        return "Data Berhasil di Hapus";
    }
}
