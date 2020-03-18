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

Route::get('/', function () {
    if (count(\App\City::all()) < 2) {
        return redirect()->route('cityWelcome', \App\City::first());
    } else {
        return view('welcome');
    }
})->name('welcome');

Route::get('in/{city?}', function (\App\City $city) {
    if (null === $city) {
        return redirect()->route('welcome');
    }
    return view('cityWelcome', compact('city'));
})->name('cityWelcome');

Route::get('in/{city}/danke', function (\App\City $city) {
    return view('thanks', compact('city'));
})->name('thanks');


Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cities', 'CityController');
Route::resource('users', 'UserController');
Route::resource('helpers', 'HelperController');
Route::resource('helpRequests', 'HelpRequestController');

Route::get('test', function () {
    dd(\App\Services\Geocoder::resolve('Liegnitzer Str. 38', 72461, 'Albstadt'));
});

Route::get('/user/password', 'UserController@changePassword')->name('changePassword');
Route::post('/user/password', 'UserController@storePassword')->name('storePassword');
