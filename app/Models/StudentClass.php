<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
   use HasFactory;

   public function teacher()
   {
       return $this->hasOne(Teacher::class, 'teacher_id');
   }

   public function majors()
   {
       return $this->hasMany(Major::class);
   }
}
