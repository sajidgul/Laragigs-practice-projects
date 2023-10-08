<?php

use App\models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

Route::get('/', [ListingController::class, 'index'])->name('index');


// in eloquent, we also have route model binding, instead of passing an id we pass a model and then the variable
Route::get('/show/{id}', [ListingController::class, 'show'])->name('show');

// Create Post page
Route::get('create', [ListingController::class, 'create'])->name('create')->middleware('auth');

Route::post('/', [ListingController::class, 'store'])->name('store')->middleware('auth');

// show edit form
Route::get('edit/{id}', [ListingController::class, 'edit'])->name('edit')->middleware('auth');

// update listing form
Route::put('update/{listing}', [ListingController::class, 'update'])->name('update')->middleware('auth');

// Manage the Listings
Route::get('manage', [ListingController::class, 'manage'])->name('manage')->middleware('auth');

// delete listing
Route::put('listings/{listing}', [ListingController::class, 'destroy'])->name('delete')->middleware('auth');


// Trash view
Route::get('manage_trash', [ListingController::class, 'manage_trash'])->name('manage_trash')->middleware('auth');

// Restore
Route::get('manage_restore/{id}', [ListingController::class, 'manage_restore'])->middleware('auth');

// Force delete
Route::put('manage_force_delete/{listing}', [ListingController::class, 'manage_force_delete'])->middleware('auth');

// show register form
Route::get('/register', [UserController::class, 'create'])->name('create')->middleware('guest');

// Register Users
Route::post('users', [UserController::class, 'store'])->name('store');

// logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login Auth User
Route::post('users/login', [UserController::class, 'show']);