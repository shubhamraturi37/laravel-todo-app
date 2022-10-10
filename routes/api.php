<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'guest:sanctum'], function () {
    Route::post('/register', 'API\Auth\RegisterController')->name('Register');
    Route::post('/login', 'API\Auth\LoginController@login')->name('Login');
});

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::post('/logout', 'API\Auth\LoginController@logout')->name('Logout');
    //Todo List
    Route::group(['prefix' => 'todo', 'as' => 'todos.'], function () {
        Route::get('/', 'API\Todo\TodoController@index')->name('Todos');
        Route::post('/create', 'API\Todo\TodoController@create')->name('Create Todo');
        Route::put('/update/{todo}', 'API\Todo\TodoController@update')->name('Update Todo');
        Route::put('/delete/{todo}', 'API\Todo\TodoController@completed')->name('complete Todo');
        Route::delete('/delete/{todo}', 'API\Todo\TodoController@destroy')->name('Permanent Delete Todo');
    });

    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
        //Route::get('/', 'API\Todo\TodoController@index')->name('Todos');
        Route::post('/create', 'API\Gallery\GalleryController@create')->name('Create Gallery image');
//        Route::put('/update/{todo}', 'API\Todo\TodoController@update')->name('Update Todo');
//        Route::put('/delete/{todo}', 'API\Todo\TodoController@completed')->name('complete Todo');
//        Route::delete('/delete/{todo}', 'API\Todo\TodoController@destroy')->name('Permanent Delete Todo');
    });
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





