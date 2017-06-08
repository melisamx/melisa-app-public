<?php

Route::get('/', function () {
    return view('guest', [
        'appName'=>config('app.name')
    ]);
})->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index');
