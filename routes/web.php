<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Listingcontrollers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Listingcontroller;
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


// all listings 
Route::get('/', [Listingcontroller::class, 'index']);

//show create form
Route::get('/listings/create', [Listingcontroller::class, 'create'])->middleware('auth');


// store listing data 
Route::post('/listings', [Listingcontroller::class, 'store']) ;

//show edit form
Route::get('/listings/{listing}/edit', [listingcontroller::class, 'edit'])->middleware('auth');


// update listing
Route::put('listings/{listing}', [Listingscontroller::class, 'update'])->middleware('auth');

//delete listing
Route::delete('listings/{listing}', [Listingscontroller::class, ' '])->middleware('auth');


//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//sigle listing
Route::get('/listings/{listing}', [Listingcontroller::class, 'show']) ;


//Show register/create form
Route::get('/register', [usercontroller::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [usercontroller::class,]);

//Log user out 
Route::post('/logout', [usercontroller::class, 'logout'])->middleware('auth');

//show loggin form
Route::get('/login', [usercontroller::class, 'login'])->name('login')->middleware('guest');

//login user account 
Route::post('/users/authenticate', [usercontroller::class, 'authenticate']);



//database connection
Route::get('/dbconn', function(){return view('dbconn');});