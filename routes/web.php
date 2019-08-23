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

// props
App::setLocale('en');
Route::pattern('slug', '[a-z-0-9]+');

// welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// single sign on
Auth::routes();
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');

// fallback home from laravel
Route::get('/home', 'HomeController@index')->name('home');

// protected routes
Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/logout', function () {
       auth()->logout();
       return redirect()->to('/');
    });

    Route::get('/dashboard', 'ServiceController@dashboard')->name('dashboard');

    Route::get('/help', 'HelpController@helpcenter')->name('help-center');

    Route::get('/editor/{slug}', 'EditorController@editor')->name('editor-slug');

    Route::get('/editor', 'EditorController@editor')->name('editor');

    Route::match(['put', 'post', 'delete'], '/service/{slug}', 'ServiceController@api')->name('api.service');

    Route::get('/service/{slug}', 'ServiceController@service')->name('service');

});
