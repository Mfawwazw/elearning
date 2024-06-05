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
    //method utk menampilkan form tambah 
    public function create(){
        // panggil view
        return view('admin.contents.course.create');
    }
    //method utk menyimpan data course
    public function store(Request $request)
    {
        //validasi data yg diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        //simpan data ke database
        Course::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        //redirect ke halaman 
        return redirect('/admin/course')->with('message', 'Data course berhasil ditambahkan!');
    }

    //method utk menampilkan halaman edit
    public function edit($id){
        //cari data berdasarkan id
        $course = Course::find($id); // select * FROM courses WHERE id = $id;

        return view('admin.contents.course.edit', [
            'course' => $course
        ]); 
    }

    //method utk menyimpan hasil update
    public function update($id, Request $request)
    {
        //cari data student berdasarkan id
        $course = Course::find($id); // select * FROM courses WHERE id = $id;

        //validasi data yg diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        //simpan perubahan
        $course->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        //kembalikan ke halaman student
        return redirect('/admin/course')->with('message', 'Data course berhasil diedit!');

    }

    //method utk menghapus student
    public function destroy($id){
        //cari data course berdasarkan id
        $course = Course::find($id); // select * FROM courses WHERE id = $id;

        //hapus course
        $course->delete();

         //kembalikan ke halaman student
         return redirect('/admin/course')->with('message', 'Data course berhasil dihapus!');
    }
}