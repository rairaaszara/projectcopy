<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Redirect,Response;

class GuruController extends Controller{

  public function index()
  {
    $data = Guru::join('kelas', 'kelas.id_jurusan', '=', 'jurusan.id_jurusan')
    ->join('guru', 'guru.id_kelas', '=', 'kelas.id_kelas')
    ->get(['jurusan.nama_jurusan', 'kelas.nama_kelas', 'guru.wali_kelas', 'kelas.id_kelas']);
    return view('get-ajax-data');
  }

  public function getData($id = 0){
    if($id==0){
      $arr['data'] = User::orderBy('id', 'asc')->get();
      }else{
        $arr['data'] = User::where('id', $id)->first();
      }
      echo json_encode($arr);
      exit;
  }
}