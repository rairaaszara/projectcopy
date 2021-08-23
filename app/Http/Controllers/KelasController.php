<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Redirect,Response;
use DB;

class KelasController extends Controller{

  public function index()
  {
    $data = Kelas::join('kelas', 'kelas.id_siswa', '=', 'siswa.id_siswa')
    ->join('jurusan', 'jurusan.id_kelas', '=', 'siswa.id_kelas')
    ->get(['siswa.nama_siswa', 'kelas.nama_kelas', 'jurusan.nama_jurusan', 'siswa.id_siswa']);
    return view('get-ajax-data');
  }
  
  public function kelas($id = 0){
    if($id==0){
      $arr['data'] = Kelas::orderBy('id', 'asc')->get();
      }else{
        $arr['data'] = Kelas::where('id', $id)->first();
      }
      echo json_encode($arr);
      exit;
  }
}

