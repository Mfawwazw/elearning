<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;


/**
 * HTTP method
 * 1. get : utk menampilkan data
 * 2. post : utk mengirim data
 * 3. put : utk mengupdate data
 * 4. delete : utk menghapus data
 */

//Route utk menampilkan teks salam
Route::get('/salam', function(){
    return "Assalamualaikum...";
});

Route::get('/profile', function(){
    return view('profile');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard',[DashboardController::class, 'index'])->name('dashboard');

//buat route utk menampilkan alamat student
Route::get('admin/student', [StudentController::class, 'index']);

//route utk menampilkan file tambah student
Route::get('admin/student/create', [StudentController::class, 'create']);

//route utk mengirim data student baru
Route::post('admin/student/store', [StudentController::class, 'store']);

//route utk menampilkan halaman edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

//route utk menyimpan hasil update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

//route utk menghapus student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

//buat route utk menampilkan alamat course
Route::get('admin/course', [CourseController::class, 'index']);

//route utk menampilkan file tambah course
Route::get('admin/course/create', [CourseController::class, 'create']);

//route utk mengirim data course baru
Route::post('admin/course/store', [CourseController::class, 'store']);

//route utk menampilkan halaman edit course
Route::get('admin/course/edit/{id}', [CourseController::class, 'edit']);

//route utk menyimpan hasil update course
Route::put('admin/course/update/{id}', [CourseController::class, 'update']);

//route utk menghapus course
Route::delete('admin/course/delete/{id}', [CourseController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
