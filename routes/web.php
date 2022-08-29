<?php

use App\Models\Listing;
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
//all listing
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');
//Delete Listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');


//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//eloquent model using route model binding
//this should be at the bottom showing single listing
// -------------------listing should match to --------this
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);






//Naming convention
//Common Resource Routes:
//index - Show all listings
//show - Show single listing
//create - Show form to create new listing
//store - store new lisitng 
//update - Update listing
//destroy - Delete listing