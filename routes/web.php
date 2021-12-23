<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
  return view('index');
})->name('home');;

Route::get('login', [HomeController::class, 'loginView'])->name('home.login');
Route::post('/do-login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('register', [HomeController::class, 'registerView']);
Route::post('/do-register', [UserController::class, 'register']);

Route::get('forgot-password', [HomeController::class, 'forgotPasswordView']);
Route::post('/recover-password', [UserController::class, 'recoverPassword']);
Route::get('/change-password', [HomeController::class, 'changePasswordView']);
Route::post('/change-password', [UserController::class, 'updatePassword']);

Route::get('/renew-password', [HomeController::class, 'renewPasswordView']);
Route::post('/renew-password', [UserController::class, 'renewPassword']);