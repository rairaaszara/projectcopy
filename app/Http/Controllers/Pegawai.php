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