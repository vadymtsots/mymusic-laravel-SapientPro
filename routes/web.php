<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/success', function () {
    return view('success');
})->name('registration.success');

Route::get('/main', [ReviewController::class, 'getAllReviews']
)->name('main');

Route::get('/registration/newuser', [UserController::class, 'showForm']
)->name('registration');

Route::post('/registration', [UserController::class, 'storeData']
)->name('submit');

Route::get('/login/form', [LoginController::class, 'loginForm']
)->name('loginForm');

Route::post('/auth', [LoginController::class, 'authenticate']
)->name('auth');
