<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LearnClassController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\StudentController;
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
Route::get('/change_password',[LoginController::class,'showChangePassword'])->name('showChangePassword');
Route::post('/change_password',[LoginController::class,'changePassword'])->name('edit.password');

Route::get('/register',[SignupController::class,'showFormRegister'])->name('showFormRegister');
Route::post('/register',[SignupController::class,'storeRegister'])->name('storeRegister');

Route::get('/login', [LoginController::class,'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class,'Login'])->name('login');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::middleware('auth')->prefix('/')->group(function () {
    Route::get('/', function () {
        return view('layout.dashboard');
        })->name('dashboard');
    Route::get('/users',[AdminController::class,'index'])->name('users.index');
    Route::prefix('/students')->group(function(){
        Route::get('/search', [StudentController::class,'getSearch'])->name('search');
        Route::get('/', [StudentController::class, 'index'])->name('students.index');
        Route::get('/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('/create', [StudentController::class, 'store'])->name('students.store');
        Route::get('{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::post('{id}/edit', [StudentController::class, 'update'])->name('students.update');
        Route::get('{id}/destroy', [StudentController::class, 'destroy'])->name('students.destroy');
    });
    Route::prefix('/learn_classes')->group(function(){
        Route::get('/', [LearnClassController::class, 'index'])->name('learn_classes.index');
        Route::get('/create', [LearnClassController::class, 'create'])->name('learn_classes.create');
        Route::post('/create', [LearnClassController::class, 'store'])->name('learn_classes.store');
        Route::get('{id}/edit', [LearnClassController::class, 'edit'])->name('learn_classes.edit');
        Route::post('{id}/edit', [LearnClassController::class, 'update'])->name('learn_classes.update');
        Route::get('{id}/destroy', [LearnClassController::class, 'destroy'])->name('learn_classes.destroy');
    });
});
