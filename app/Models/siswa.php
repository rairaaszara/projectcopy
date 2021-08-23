<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama_siswa'];
    public $incrementing = false;
    public $timestamps = false;

    public function kelas()
    {
        return $this->hasOne('App\kelas');
    }
}
