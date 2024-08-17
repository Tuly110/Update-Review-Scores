<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\updateScoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class,'AuthLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forgot_password', [AuthController::class, 'forgotpassword']);
Route::post('/forgot_password', [AuthController::class, 'PostForgotPassword']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'insert_register']);



Route::get('admin/admin/subject', function () {
    return view('admin.admin.subject');
});

// SUBJECT   
Route::get('admin/admin/subject', [SubjectController::class, 'list']);

// STUDENT 
Route::get('admin/admin/mark/{id}', [StudentController::class, 'list']);

// UPDATE SCORE 
Route::get('admin/admin/update_score/{id}', [StudentController::class, 'update_score']);
Route::post('admin/admin/update_score/{id}', [StudentController::class, 'save_score']);
Route::get('admin/admin/view_update_score/{id}', [StudentController::class, 'view_update_score']);

// EXPORT EXCEL
Route::get('/export_excel/{id}', [UserController::class, 'export_excel'])->name('export_excel');

