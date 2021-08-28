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


}