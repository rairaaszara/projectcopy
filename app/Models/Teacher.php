<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['nama_guru', 'alamat'];

    public function studentClass()
    {
        return $this->hasOne(StudentClass::class);
    }
}