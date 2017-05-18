<?php

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
Route::group(['middleware' => 'auth'], function () {
/*    Route::get('/', function () {
        return view('home');
    })->name('home');
*/
	//Route::get('/destroyprofile/{profile}/destroy', 'ProfileController@destroyProfile')->name('destroyprofile');
	Route::resource('profiles', 'ProfileController', ['except' => ['index', 'show']]);
	Route::resource('users', 'UserController');
  
}); 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/userslist', 'UserController@index');
Route::resource('profiles', 'ProfileController', ['only' => ['index', 'show']]);
//Route::get('/profiles/userslist', 'HomeController@usersList')->name('profiles.show');


//Route::get('user/{id}', 'UserController@edit');