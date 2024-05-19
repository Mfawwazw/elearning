<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('admin/dashboard',[DashboardController::class, 'index']);