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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// This first one uploads the image to storage/app/public/img// This first one uploads the image to storage/app/public/img
Route::post('monsters/img', 'ImageController@upload');

Route::get('monsters', 'MonsterController@index');
Route::post('monsters', 'MonsterController@store');

// I still don't know a better solution yet, however these are now working.





//Route::post('monsters', 'ImageController@upload');

// This second one will retrieve an image and apply manipulations as stipulated in the url i.e '?w=600&h=480&filt=greyscale',
// but will only do so if the url used follows the pattern - 'api/monsters/img/nameoffile.png'
Route::get('monsters/img/{path}', 'ImageController@show');
//Route::get('monsters/{path}', 'ImageController@show');