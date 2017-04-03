<?php

Route::get('/', function () {
    return view('guest', [
        'appName'=>config('app.name')
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
