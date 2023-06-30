<?php

use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
//All listings
Route::get('/','ListingController@index');

//Show create form
Route::get('/listings/create','ListingController@create')->middleware('auth');

//Store listing data
Route::post('/listings','ListingController@store')->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit', 'ListingController@edit')->middleware('auth');

//Update listing
Route::put('/listings/{listing}', 'ListingController@update')->middleware('auth');

//Delete listing
Route::delete('/listings/{listing}', 'ListingController@destroy')->middleware('auth');


// Manage Listings
Route::get('/listings/manage', 'ListingController@manage')->middleware('auth');

//Single listing
Route::get('/listings/{listing}', 'ListingController@show');


//Show Register/Create Form
Route::get('/register', 'UserController@create')->middleware('guest');

// Create New User
Route::post('/users', 'UserController@store');

//Log User Out
Route::post('/logout','UserController@logout')->middleware('auth');

//Show Login Form 
Route::get('/login','UserController@login')->name('login')->middleware('guest');


//Log in user
Route::post('/users/authenticate', 'UserController@authenticate');

