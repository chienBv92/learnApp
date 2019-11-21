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
    return view('index');
});

// Lấy danh sách level
Route::get('listKanjiLevel', 'Api\kanjiLevelController@index');

// Lấy danh sách kanji by Level
Route::get('getKanjiByLevel/{metaTitle}', 'Api\kanjiLevelController@getKanjiByLevel');
