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

// not currently in use but will be.

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


// This first one uploads the image to storage/app/public/img or at least it did,
// image functionality is now in monster controller.
// Should be deleting it not writing these comments, however I'm in comment mode.
Route::post('monsters/img', 'ImageController@upload');



Route::get('monsters', 'MonsterController@index');
Route::post('monsters', 'MonsterController@store');
Route::delete('monsters/{id}', 'MonsterController@delete');
Route::put('monsters/{id}', 'MonsterController@update');
Route::get('monsters/{id}', 'MonsterController@show');


// This second one will retrieve an image and apply manipulations as stipulated in the url i.e '?w=600&h=480&filt=greyscale',
// but will only do so if the url used follows the pattern - 'api/monsters/img/nameoffile.png'

// Laravel-Glide
Route::get('monsters/img/{path}', 'ImageController@show');
