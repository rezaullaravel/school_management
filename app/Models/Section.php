<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable =[
        'clas_id',
        'section_name',
    ];

    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id');
    }
}
