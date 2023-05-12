<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

//backendroutes;

Route::get('login/admin',[AdminController::class,'adminloginForm'])->name('admin.login.form');
Route::post('admin-login',[AdminController::class,'adminlogin'])->name('admin.login');

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('admin-logout',[AdminController::class,'adminLogout'])->name('admin.logout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
