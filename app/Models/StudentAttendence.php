<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendence extends Model
{
    use HasFactory;
    protected $fillable = [
        'clas_id',
        'student_id',
        'attendence_type',
        'date',
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
