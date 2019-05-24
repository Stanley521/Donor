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

// Route::get('/', function() {
    // return redirect()->route('home');
// });

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return redirect('home');
});

Route::get('/addevent', 'AddEventController@index')->name('addevent');

Route::post('/addevent', 'AddEventController@PostEvent')->name('postevent');

Route::get('/detail/{id}', 'DetailController@index')->name('detail');

Route::post('/debug', 'DebugController@index')->name('debug');

