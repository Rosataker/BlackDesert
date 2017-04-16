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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});


Route::group(['prefix'=>'ProfitConversion'], function()
{
    Route::get('/', 'ProfitConversionController@index');

    Route::get('/add', 'ProfitConversionController@create');
    Route::get('/edit/{id}', 'ProfitConversionController@edit');

    Route::post('/', 'ProfitConversionController@store');
    Route::delete('/del/{id}', 'ProfitConversionController@destroy');

    Route::match(['get', 'post'], '/search', 'ProfitConversionController@search');    
});



