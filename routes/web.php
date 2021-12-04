<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin_landing', [AdminController::class,'index']);
    Route::get('/registered_staff', [AdminController::class,'registeredStaff']);
    Route::get('/add_staff', [AdminController::class,'addStaff']);
    Route::get('/roles', [AdminController::class,'roles']);
    Route::get('/registered_patients', [AdminController::class,'registeredPatients']);
});

//Doctor Routes
Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor_landing', [DoctorController::class, 'index'])->name('doctor_landing');
    Route::get('/patients', [DoctorController::class,'patients']);
    Route::get('/patients_waiting', [DoctorController::class,'patientsWaiting']);
    Route::get('/vitals', [DoctorController::class,'vitals']);
    Route::get('/history', [DoctorController::class,'history']);
    
});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/myprofile', [UserController::class, 'show'])->name('myprofile');
    Route::get('/myprofileUpdate', [UserController::class, 'edit'])->name('myprofileUpdate');
});




//User Routes


// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact-us', function () {
//     return view('contact');
// });

Route::get('/logout', function () {
    return view('layouts.app');
});
