<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::namespace('Notes')->prefix('notes')->group(function() {
    Route::get('{id?}', 'MainController@index')->name('notes');
    Route::get('note/{id}', 'NotesController@index');
    Route::get('links/{id}', 'NotesController@getNoteLinks');
    Route::get('tags/{id}', 'NotesController@getNoteTags');

    //Route::apiResource('tags', 'TagsController');
    //Route::apiResource('links', 'LinksController');
});

Route::get('/home', 'HomeController@index')->name('home');
