<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //menampilkan() data course dari database
    public function index(){
        //menampilkan data dari table course
        $courses = Course::all();

        //kirim data ke view utk ditampilkan
        return view('admin.contents.course.index', [
            'courses' => $courses
        ]);

    }
}