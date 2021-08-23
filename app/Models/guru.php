<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = ['wali_kelas'];
    public $incrementing = false;
    public $timestamps = false;

    public function kelas()
    {
        return $this->hasOne('App\Kelas');
    }
}
