<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table =  'students';

    //mendefinisikan field yg boleh diisi
    protected $fillable = ['name', 'nim', 'major', 'class', 'course_id'];

    //mendefinisikan relasi kemodel course
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
