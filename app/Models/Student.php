<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id')->withDefault();
    }

    public function section(){
        return $this->belongsTo(Section::class,'section_id')->withDefault();
    }

    public function session(){
        return $this->belongsTo(SessionModel::class,'session_id')->withDefault();
    }
}
