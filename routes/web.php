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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('events_places');
});

Route::get('/current-events', function () {                                // Map view of current events
    return view('events_places');
});

Route::get('/event/{event}', function (\App\Event $event) {
    return view('stands', compact('event'));
});

Route::get('booking/{stand}', 'BookingController@create');
Route::post('booking', 'BookingController@store');

Route::get('/download', function () {
    $file = storage_path('app/' . request('file') );
    return response()->download( $file );
});

Route::get('stand/{stand}', 'StandController@show');