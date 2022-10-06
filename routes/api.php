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
    Route::post('/register', 'API\Auth\RegisterController')->name('register');
    Route::post('/login', 'API\Auth\LoginController@login')->name('login');
});

Route::group(['middleware'=>'auth:sanctum'],function(){
    //Todo List
    Route::group(['prefix' => 'todo', 'as' => 'todos.'], function () {
        Route::post('/', 'API\Todo\TodoController@index')->name('Todos');
        Route::post('/create', 'API\Todo\TodoController@create')->name('Create Todo');
        Route::put('/update/{todo}', 'API\Todo\TodoController@update')->name('Update Todo');
        Route::delete('/delete/{todo}', 'API\Todo\TodoController@destroy')->name('Delete Todo');
    });
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todo', 'API\TodoController@index')->name('todo List');


