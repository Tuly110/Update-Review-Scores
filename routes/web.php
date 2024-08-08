<?php

use App\Http\Controllers\AuthController;
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
// Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'insert_register']);



Route::get('admin/admin/subject', function () {
    return view('admin.admin.subject');
});