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

Route::get('new', [ReviewController::class, 'addReviewForm']
)->name('addReview');

Route::post('new/review', [ReviewController::class, 'storeData']
)->name('reviewSubmit');

Route::get('/login/form', [LoginController::class, 'loginForm']
)->name('loginForm');

Route::post('/auth', [LoginController::class, 'authenticate']
)->name('auth');

Route::post('/logout', [LoginController::class, 'logout']
)->name('logout');

Route::post('/registration', [UserController::class, 'storeData']
)->name('registrationSubmit');

Route::get('/users/user:id', [ReviewController::class, 'getUserReviews']
)->name('userReviews');

Route::get('/reviews/{review}', [ReviewController::class, 'getSingleReview']
)->name('singleReview');

Route::get('albums/{album}', [AlbumController::class, 'getAlbum']
)->name('getAlbum');

Route::get('review/edit/{review}', [ReviewController::class, 'editForm']
)->name('editForm');

Route::post('/edit/{review:id}', [ReviewController::class, 'updateReview']
)->name('editSubmit');

Route::get('/review/delete/{review}', [ReviewController::class, 'deleteConfirmation']
)->name('deleteConfirmation');

Route::delete('/delete/{review:id}', [ReviewController::class, 'deleteReview']
)->name('deleteReview');

Route::get('/artists', [ArtistController::class, 'getArtists']
)->name('getArtists');

//Route::get('/artists/search', [ArtistController::class, 'searchArtist']
//)->name('searchArtist');


