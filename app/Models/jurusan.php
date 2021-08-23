<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $fillable = ['nama_jurusan'];
    public $incrementing = false;
    public $timestamps = false;
    

    public function kelas()
    {
        return $this->hasMany('App\kelas');
    }
}
