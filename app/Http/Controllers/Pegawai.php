<?php

namespace App\Http\Controllers;

use App\Models\Pegawai_model;
use Illuminate\Http\Request;

class Pegawai extends Controller
{
    public function index()
    {
        $data['list'] = Pegawai_model::all();
        // dd($data);
        return view('pegawai.pegawai', $data);
    }
}


$request->validate([
    'nama_guru' => 'required',
    'alamat' => 'required'
]);

Teacher::where('id', $teacher->id)
      ->update([
          'nama_guru' => $request->nama_guru,
          'alamat' => $request->alamat
      ]);

      return "Data Berhasil Diubah!";