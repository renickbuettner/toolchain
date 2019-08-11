<?php

use Toolchain\Services as ServicesModel;

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

Route::pattern('slug', '[a-z0-9]+');


Route::get('/', function () {
    return view('welcome');
});

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'ServiceController@dashboard')->name('dashboard');

Route::match(
    ['get', 'post', 'delete'],
    '/service/{slug}',
    'ServiceController@service'
)->name('service');
