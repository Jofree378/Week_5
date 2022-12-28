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
Route::get('/categories/games/{name}', 'GamesController@index')->name('games');
Route::get('/categories/games/game/{id}', 'GamesController@game')->name('game');
Route::get('/categories/create', 'CategoriesController@createCat')->name('categories.create');
Route::post('/categories/add', 'CategoriesController@add')->name('categories.add');
Route::get('/categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
Route::get('/categories/edit/{categories}', 'CategoriesController@edit')->name('categories.edit');
Route::post('/categories/editSave', 'CategoriesController@editSave')->name('categories.editSave');
Route::get('/categories/game/create', 'GamesController@create')->name('games.create');
Route::post('/categories/game/add', 'GamesController@addGame')->name('games.add');
Route::get('/categories/games/deleteGame/{id}', 'GamesController@deleteGame')->name('games.delete');
Route::get('/categories/games/edit/{game}', 'GamesController@edit')->name('games.edit');
Route::post('/categories/games/editSave', 'GamesController@editSave')->name('games.editSave');

