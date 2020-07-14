<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::namespace('Notes')->prefix('notes')->group(function() {
    Route::get('{id?}', 'MainController@index')->name('notes');
});

Route::get('/home', 'HomeController@index')->name('home');
