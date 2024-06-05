<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method utk menampilkan data student
    public function index(){
        // tarik data student dari database
        $students =  Student::all();

        // panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    //method utk menampilkan form tambah student
    public function create(){
        // panggil view
        return view('admin.contents.student.create');
    }

    //method utk menyimpan data student
    public function store(Request $request)
    {
        //validasi data yg diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        //simpan data ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        //redirect ke halaman student
        return redirect('/admin/student')->with('message', 'Data student berhasil ditambahkan!');
    }

    //method utk menampilkan halaman edit
    public function edit($id){
        //cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        return view('admin.contents.student.edit', [
            'student' => $student
        ]); 
    }

    //method utk menyimpan hasil update
    public function update($id, Request $request)
    {
        //cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        //validasi data yg diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        //simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        //kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Data student berhasil diedit!');

    }

    //method utk menghapus student
    public function destroy($id){
        //cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        //hapus student
        $student->delete();

         //kembalikan ke halaman student
         return redirect('/admin/student')->with('message', 'Data student berhasil diedit!');
    }
}