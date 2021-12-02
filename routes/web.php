<?php

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

Route::get('/registered_staff', function () {
    return view('registered_staff');
});

Route::get('/roles', function () {
    return view('roles');
});

Route::get('/add_staff', function () {
    return view('add_staff');
});

Route::get('/registered_patients', function () {
    return view('registered_patients');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin_landing', [App\Http\Controllers\AdminController::class, 'index'])->name('admin_landing');

