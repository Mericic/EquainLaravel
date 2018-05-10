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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accueil', 'HomeController@index')->name('accueil');
Route::get('/', 'HomeController@index')->name('/');
Route::get('/activite', 'PagesController@getPage')->name('activite');
Route::get('/oxer',  'PagesController@getPage')->name('oxer');
Route::get('/structure',  'PagesController@getPage')->name('structure');
Route::get('/cavalerie',  'PagesController@getPage')->name('cavalerie');
Route::get('/equipe',  'PagesController@getPage')->name('equipe');

Route::post('element/modif', 'ElementsController@modifElement')->name('modifElement');


Route::get('/reprises', 'PagesController@getPage')->name('reprises');
Route::get('/inscriptions_tarifs', 'PagesController@getPage')->name('inscriptions_tarifs');

Route::get('/actualite', 'PagesController@getPage')->name('actualite');