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








Route::group(array('as' => 'ProfitConversion::'), function()
{

    Route::get('/', function () {
        return view('welcome');
    })->name('Home');

    Route::get('ProfitConversion', function () {
        return view('ProfitConversion.view');
        #return redirect()->route('ProfitConversion::view');
    })->name('View');


    Route::get('ProfitConversion/edit', ['as' => 'edit', function () {
        return 'edit';
    }]);

});

