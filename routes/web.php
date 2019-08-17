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

App::setLocale('en');

Route::pattern('slug', '[a-z-0-9]+');


Route::get('/', function () {
    return view('welcome');
});

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'ServiceController@dashboard')->name('dashboard');

Route::get('/editor/{slug}', 'EditorController@editor')->name('editor-slug');
Route::get('/editor', 'EditorController@editor')->name('editor');

Route::match(['put', 'post', 'delete'], '/service/{slug}', 'ServiceController@api')->name('api.service');
Route::get('/service/{slug}', 'ServiceController@service')->name('service');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
