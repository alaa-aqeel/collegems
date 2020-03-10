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

Auth::routes(['verify' => true]);



Route::get('/', 'HomeController@index');


Route::view('/about', 'about');
Route::get('/tranining', 'TraniningController@index');
Route::get('/projects', 'ProjectController@index');
Route::get('/projects/{collegeid}', 'ProjectController@show')->where('collegeid', '[0-9]+');
Route::get('/user/{id}', 'ProfileController@show')->where('id', '[0-9]+');


Route::middleware(['auth'])->group(function () {

    Route::get("/logout", function(){
        Auth::logout();

        return redirect("/");
    });

    Route::get('/profile', 'ProfileController@index')->middleware('verified');
    Route::resource("/project", 'ProjectController')->middleware('user.active')->middleware('verified');
});

Route::middleware(['admin:web', 'auth'])->prefix('admin')->group(function () {

    Route::get("/", 'AdminViewController@index');
    Route::get("/user", 'AdminViewController@users');
    Route::get("/project/{active}", 'AdminViewController@projects')->where('active', '[0-9]');
    Route::get("/tranining", 'AdminViewController@tranining');
});
