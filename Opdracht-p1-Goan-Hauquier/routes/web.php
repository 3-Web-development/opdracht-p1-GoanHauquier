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


Route::get('/', 'PagesController@getHome');

Route::get('/', 'ParticipationController@getWinners');

Route::get('/contest', 'PagesController@getContest');

Route::get('/participants', 'ParticipationController@getParticipants');



Route::post('/contest/submit', 'ParticipationController@submit');

Route::post('/participants/disqualify/{id}', 'ParticipationController@disqualify');
