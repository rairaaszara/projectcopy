<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCollection;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\ApiResponse;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $teacher = Teacher::all();
            $data    = new TeacherCollection($teacher);
            return ApiResponse::success("sukses mengambil data guru", $teacher);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),$th);
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
        

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        try {
            $teacher->load('studentClass');
            return ApiResponse::success("sukses mengambil data guru",$teacher);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return ApiResponse::error($th->getMessage(),$th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
