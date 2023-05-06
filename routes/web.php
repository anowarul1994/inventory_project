<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware' => 'auth', 'prefix'=>'dashboard' ], function (){
     
     Route::get('/', [BackendController::class, 'index'])->name('back.index');

     //employee controller
     
     Route::resource('employees', EmployeeController::class);
     Route::resource('customers', CustomerController::class);
     



});


Route::get('/logout', [BackendController::class, 'logout'])->name('back.logout');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
