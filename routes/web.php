<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use App\Http\Middleware\CheckLogin;

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

// Route::get('/', function () {
//   return view('index');
// })->name('home');;
Route::get('/', [HomeController::class, 'indexView'])->name('home.index');

Route::get('login', [HomeController::class, 'loginView'])->name('home.login');
Route::post('/do-login', [UserController::class, 'login']);

Route::get('register', [HomeController::class, 'registerView']);
Route::post('/do-register', [UserController::class, 'register']);

Route::get('forgot-password', [HomeController::class, 'forgotPasswordView']);
Route::post('/recover-password', [UserController::class, 'recoverPassword']);

Route::get('/renew-password', [HomeController::class, 'renewPasswordView']);
Route::post('/renew-password', [UserController::class, 'renewPassword']);

Route::group(['middleware' => ['web', 'App\Http\Middleware\CheckLogin'], 'prefix' => ''], function () {
  Route::get('/logout', [UserController::class, 'logout']);
  Route::get('/change-password', [HomeController::class, 'changePasswordView']);
  Route::post('/change-password', [UserController::class, 'updatePassword']);
});

Route::group(['middleware' => ['web', 'App\Http\Middleware\CheckMaster'], 'prefix' => ''], function () {

});

Route::get('book-master/login', [MasterController::class, 'loginView'])->name('master.loginView');
Route::post('book-master/login', [UserController::class, 'loginMaster']);
Route::get('book-master', [MasterController::class, 'indexView'])->name('master.index');
Route::get('book-master/user-manage', [MasterController::class, 'userManView'])->name('master.userManage');