<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MajorCollection;
use App\Models\Major;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\ApiResponse;
use App\Http\Resources\MajorResource;


class MajorController extends Controller
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
        $major = Major::all();
        return Major::all();
        try {
            $data    = new MajorCollection(Major::with('studentClass')->get());
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
        $major = new Major;
        $major->nama_jurusan = $request->nama_jurusan;
        $major->save();

        try {
            $data    = new MajorCollection(Major::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        return $major;
        try {
            $data    = new MajorResource($major);
            return ApiResponse::success(self::SHOW_MESSAGE, $data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return ApiResponse::error($th->getMessage(),$th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jurusan' => 'required'
        ]);

         $nama_jurusan = $request->nama_jurusan;

         $major = Major::find($id);
         $major->nama_jurusan = $nama_jurusan;
         $major->save();

         try {
            $data    = new MajorCollection(Major::with('studentClass')->get());
            return ApiResponse::success(self::INDEX_MESSAGE, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
       Major::destroy($major->id);

       try {
        $data    = new MajorCollection(Major::with('studentClass')->get());
        return ApiResponse::success(self::INDEX_MESSAGE, $data);
    } catch (\Throwable $th) {
        return ApiResponse::error($th->getMessage(), $th);
    }
    }
}
