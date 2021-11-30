<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsBanned;
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
)->name('success');

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
    '/myreviews',
    [ReviewController::class, 'getAuthenticatedUserReviews']
)->name('authenticatedUserReviews');

Route::get(
    '/user-reviews/{user}',
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

Route::get(
    'users/banned',
    [UserController::class, 'getBannedUsers']
)->name('bannedUsers');

Route::get(
    '/user/ban/{user}',
    [UserController::class, 'banConfirmation']
)->name('banConfirmation');

Route::post(
    '/ban/{user:id}',
    [UserController::class, 'banUser']
)->name('banUser');

Route::post(
    '/unban/{user:id}',
    [UserController::class, 'unBanUser']
)->name('unBanUser');

Route::get(
    'users/search/{user:name}',
    [UserController::class, 'searchUser']
)->name('searchUser');

Route::get(
    'user/edit/{user}',
    [UserController::class, 'showEditForm']
)->name('editUser');

Route::post(
    'edit-user/{id}',
    [UserController::class, 'updateUser']
)->name('updateUser');

Route::get(
    'password/change/{user}',
    [UserController::class, 'changePasswordForm']
)->name('changePasswordForm');

Route::post(
    'password/change/submit',
    [UserController::class, 'updatePassword']
)->name('updatePassword');

Route::get(
    '/forgot-password',
    [ResetPasswordController::class, 'forgotPasswordForm']
)->middleware('guest')->name('password.request');

Route::post(
    '/forgot-password/submit',
    [ResetPasswordController::class, 'sendResetLink']
)->middleware('guest')->name('password.email');

Route::get(
    '/reset-password/{token}',
    [ResetPasswordController::class, 'resetPasswordForm']
)->middleware('guest')->name('password.reset');

Route::post(
    '/reset-password/submit',
    [ResetPasswordController::class, 'resetPassword']
)->middleware('guest')->name('password.update');


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
)->name('auth');

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

Route::get(
    'spotify-albums/{id}',
    [AlbumController::class, 'getSpotifyAlbum']
)->name('getSpotifyAlbum');

Route::get(
    'album/new',
    [AlbumController::class, 'addAlbumForm']
)->name('addAlbumForm');

Route::post(
    'album/new/submit',
    [AlbumController::class, 'storeAlbumData']
)->name('storeAlbumData');

/**
 * Mail related routes
 */

Route::get('send-mail', [MailController::class, 'sendMail']);






