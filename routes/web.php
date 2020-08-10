<?php

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

Route::get('/login', function()
{
  return view('passwords/login');
});

Route::middleware('auth')->group(function(){
  Route::get('/tweets' , 'TweetController@index')->name('home');
  Route::post('/tweets' , 'TweetController@store')->name('tweets');
  Route::post('profiles/{user:username}/follows', 'FollowsController@store');
  Route::get('profiles/{user:username}/edit', 'ProfilesController@edit');
  Route::patch('profiles/{user:username}/edit', 'ProfilesController@update');
});

Route::get('profiles/{user:username}', 'ProfilesController@show')->name('profile');

Auth::routes();
