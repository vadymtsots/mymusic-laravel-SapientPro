<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

/**
 * Reviews related routes
 */

Route::get(
    '/main',
    [ReviewController::class, 'getAllReviews']
)->name('main');

Route::get(
    'new',
    [ReviewController::class, 'addReviewForm']
)->name('addReview');

Route::post(
    'new/review',
    [ReviewController::class, 'storeData']
)->name('reviewSubmit');

Route::get(
    '/success',
    function () {
        return view('success');
    }
)->name('registration.success');

Route::get(
    '/reviews/{review}',
    [ReviewController::class, 'getSingleReview']
)->name('singleReview');

Route::get(
    'review/edit/{review}',
    [ReviewController::class, 'editForm']
)->name('editForm');

Route::post(
    '/edit/{review:id}',
    [ReviewController::class, 'updateReview']
)->name('editSubmit');

Route::get(
    '/review/delete/{review}',
    [ReviewController::class, 'deleteConfirmation']
)->name('deleteConfirmation');

Route::delete(
    '/delete/{review:id}',
    [ReviewController::class, 'deleteReview']
)->name('deleteReview');

/**
 * User related routes
 */


Route::get(
    '/registration/newuser',
    [UserController::class, 'showForm']
)->name('registration');

Route::post(
    '/registration',
    [UserController::class, 'storeData']
)->name('registrationSubmit');

Route::get(
    '/user-reviews',
    [ReviewController::class, 'getUserReviews']
)->name('userReviews');

Route::get(
    'user/{user:name}',
    [UserController::class, 'getUser']
)->name('getUser');

Route::get(
    '/users',
    [UserController::class, 'getAllUsers']
)->name('users');

/**
 * Authentication related routes
 */


Route::get(
    '/login/form',
    [LoginController::class, 'loginForm']
)->name('loginForm');

Route::post(
    '/auth',
    [LoginController::class, 'authenticate']
)->name('auth')
    ->middleware('throttle:5,5');


Route::post(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');

/**
 * Artists related routes
 */

Route::get(
    '/artists',
    [ArtistController::class, 'getArtists']
)->name('getArtists');

//Route::get('/artists/search', [ArtistController::class, 'searchArtist']
//)->name('searchArtist');

Route::get(
    '/new/{artist:name}',
    [ArtistController::class, 'getArtist']
)->name('fetchArtist');

/**
 * Album related routes
 */
Route::get(
    'albums/{album}',
    [AlbumController::class, 'getAlbum']
)->name('getAlbum');






