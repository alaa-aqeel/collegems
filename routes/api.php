<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {

//     return $request->user();
// });

Route::middleware(['auth:api'])->group(function () {

    Route::put('/profile', 'ProfileController@update');
});


Route::middleware(['admin:api','auth:api'])->group(function () {


    Route::resource('/college', 'API\CollegeController');
    Route::resource('/user', 'API\UsersController');
    Route::resource('/project', 'API\ProjectsController');
    Route::resource('/tran', 'API\TraniningController');
});
