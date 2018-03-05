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

Route::get('/', function () {
    return view('master');
//    return view('welcome');
});

Route::any('{all}', function () {
    return view('master');

})
    ->where(['all' => '.*']);

// Pretty sure this isn't the best way to achieve what I want but checking to see if it works?

//Route::get('monsters', function () {
//    return view('mostwanted');
//});


// Don't think I'm using this anymore...

//Route::post('monsters', function () {
//    request()->file('monster')->store('public/most_wanted');
//    return back();
//});


// Routes to handle existing Monsters and the Add New Monster form.

//Route::get('monsters', 'MonsterController@index');

//Route::post('api/monsters', function () {
//    return console.log(['Monster1', 'Monster2', 'Monster3', 'Monster4']);
//});

//Route::get('monsters/new', 'MonsterController@create');
//
//Route::get('monsters/{id}', 'MonsterController@show');

//Route::get('/api/monsters', 'MonsterController@store');
//Route::post('api/monsters', 'MonsterController@store');


// Post data to this url
//Route::post('monsters/public/img', 'ImageController@upload');
//Route::post('monsters/img/{path}', 'ImageController@upload');

//Get data from this url to store in the database.
//Route::get('monsters/img/{path}', 'ImageController@show');

//Route::post('new-monster/upload', 'ImageController@upload')->name('upload');

//Route::post('monsters/new', 'ImageController@upload')->name('upload');

//Route::get('img/{path}', 'ImageController@show')->where('path', '.*');

//Route::get('img/{path}', 'ImageController@show')->where('path', '.*');
//Route::get('storage/app/public/img/{path}', 'ImageController@show')->where('path', '.*');
