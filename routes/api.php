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
    Route::post('/todo','API\Todo\TodoController@index')->name('Todos');
    Route::post('/todo/create','API\Todo\TodoController@createTodo')->name('Todos');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todo', 'API\TodoController@index')->name('todo List');


