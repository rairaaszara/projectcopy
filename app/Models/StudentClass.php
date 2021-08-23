<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
