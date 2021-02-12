<?php

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

//listing des articles
Route::get('articles', 'ArticleController@index')->name('articles.index');

//affichage de la page de création
Route::get('articles/create', 'ArticleController@create')->name('articles.create');

//création
Route::post('articles', 'ArticleController@store')->name('articles.store');

//affichage de la page d'un article
Route::get('articles/{article}', 'ArticleController@show')->name('articles.show');

//affichage de la page d'édition
Route::get('articles/{article}/edit', 'ArticleController@edit')->name('articles.edit');

//modification
Route::put('articles/{article}', 'ArticleController@update')->name('articles.update');

//suppression
Route::delete('articles/{article}', 'ArticleController@destroy')->name('articles.destroy');


// Déclaration globale des routes
// Route::resource('articles', 'ArticleController');
// Pour vérifier si cela a bien fonctionné :
// php artisan route:list
