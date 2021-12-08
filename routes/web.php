<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\MedicalRecordController;
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
    Route::get('/admin_profile', [AdminController::class,'admin_profile']);
    Route::get('/view_profile', [AdminController::class,'view_profile']);
});

//Doctor Routes
Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor_landing', [DoctorController::class, 'index'])->name('doctor_landing');
    Route::get('/patients', [DoctorController::class,'patients']);
    Route::get('/patients_waiting', [DoctorController::class,'patientsWaiting']);
    Route::get('/showMedicalRecord/{id}',[DoctorController::class,'medicalRecord']);
    Route::get('/showMedicalHistory/{id}',[DoctorController::class,'medicalHistory']);
    Route::get('/editMedicalHistory/{id}',[DoctorController::class,'editMedicalHistory'])->name('editMedicalHistory');
    Route::post('/updateMedicalHistory',[DoctorController::class,'updateMedicalHistory'])->name('updateMedicalHistory');
    Route::post('/updateMedicalRecord',[DoctorController::class,'updateMedicalRecord'])->name('updateMedicalRecord');
    Route::get('/editMedicalRecord/{id}',[DoctorController::class,'editMedicalRecord'])->name('editMedicalRecord');
    Route::get('/vitals', [DoctorController::class,'vitals']);
    Route::get('/history', [DoctorController::class,'history']);

});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/myprofile', [UserController::class, 'show'])->name('myprofile');
    Route::get('/myprofileEdit', [UserController::class, 'edit'])->name('myprofileEdit');
    Route::post('/myprofileUpdate/{patient_id}', [UserController::class, 'update'])->name('myprofileUpdate');
    Route::get('/medicalHistory', [UserController::class, 'showMedicalHistory'])->name('medicalHistory');
    Route::get('/medicalHistoryEdit', [UserController::class, 'editMedicalHistory'])->name('medicalHistoryEdit');
    Route::post('/medicalHistoryUpdate', [UserController::class, 'updateMedicalHistory'])->name('medicalHistoryUpdate');
    Route::post('/emergencyContactUpdate', [UserController::class, 'updateEmergencyContact'])->name('emergencyContactUpdate');

    Route::get('/medicalRecord', [MedicalRecordController::class, 'show'])->name('medicalRecord');
    Route::get('/medicalRecordNew', [MedicalRecordController::class, 'add'])->name('medicalRecordNew');
    Route::post('/medicalRecordAdd', [MedicalRecordController::class, 'save'])->name('medicalRecordAdd');

    Route::get('/trainFace', [UserController::class, 'trainFace'])->name('trainFace');
});

//nurse routes
Route::middleware([])->group(function () {
   
    Route::get('/nurse_landing', [NurseController::class, 'index'])->name('nurse_landing'); // done 
    Route::put('/updateMedicalHistory', [NurseController::class, 'updateMedicalHistory'])->name('updateMedicalHistory'); // done
    Route::get('/register_patient', [NurseController::class, 'store'])->name('register_patient');//done
    Route::post('/updatePatientDetails', [NurseController::class, 'updatePatientsDetails'])->name('updatePatientDetails');// done
   
   /*not completed
    Route::get('/vitals', [NurseController::class, 'vitals'])->name('vitals');
    Route::get('/history', [NurseController::class, 'history'])->name('history');*/
    
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
