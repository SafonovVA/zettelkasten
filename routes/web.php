<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::name('notes.')
    ->namespace('Notes')
    ->prefix('notes')
    ->middleware('auth')
    ->group(function () {
        Route::get('{id?}', 'MainController@index')->where(['id' => '[0-9]+'])/*->name('notes.index')*/;
        //Route::get('note/create', 'NotesController@create')->name('notes.create');
        //Route::get('note/{id}', 'NotesController@index');

        Route::resource('notes', 'NotesController');
        Route::get('notes/links/{id}', 'NotesController@getNoteLinks')->name('notes.links.show');
        Route::get('notes/tags/{id}', 'NotesController@getNoteTags')->name('notes.tags.show');

        //Route::apiResource('tags', 'TagsController');
        //Route::apiResource('links', 'LinksController');
    });


Route::get('/home', 'HomeController@index')->name('home');
