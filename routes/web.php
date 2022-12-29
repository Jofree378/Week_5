<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/order', 'OrderController@index')->name('orders');
Route::post('/order/changeEmail', 'OrderController@changeEmail')->name('orders.changeEmail');
Route::get('/categories/games/{name}', 'GamesController@index')->name('games');
Route::get('/categories/games/game/{id}', 'GamesController@game')->name('game');
Route::get('/categories/create', 'CategoriesController@createCat')->name('categories.create')->middleware('isadmin');
Route::post('/categories/add', 'CategoriesController@add')->name('categories.add')->middleware('isadmin');
Route::get('/categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete')->middleware('isadmin');
Route::get('/categories/edit/{categories}', 'CategoriesController@edit')->name('categories.edit')->middleware('isadmin');
Route::post('/categories/editSave', 'CategoriesController@editSave')->name('categories.editSave')->middleware('isadmin');
Route::get('/categories/game/create', 'GamesController@create')->name('games.create')->middleware('isadmin');
Route::post('/categories/game/add', 'GamesController@addGame')->name('games.add')->middleware('isadmin');
Route::get('/categories/games/deleteGame/{id}', 'GamesController@deleteGame')->name('games.delete')->middleware('isadmin');
Route::get('/categories/games/edit/{game}', 'GamesController@edit')->name('games.edit')->middleware('isadmin');
Route::post('/categories/games/editSave', 'GamesController@editSave')->name('games.editSave')->middleware('isadmin');
Route::get('/categories/games/game/buy/{game}', 'GamesController@buy')->name('game.buy');
Route::post('/categories/games/game/buySend/{id}', 'GamesController@buySend')->name('game.buySend');

