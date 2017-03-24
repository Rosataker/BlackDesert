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

Route::get('login', function() {
  // code here
})->name('login');


Route::get('ProfitConversion', function () {
    return redirect()->route('ProfitConversion::view');
});





Route::group(array('as' => 'ProfitConversion::'), function()
{
    Route::get('ProfitConversion/view', ['as' => 'view', function () {
        return 'view';
    }]);

    Route::get('user/profile', function()
    {
    	return 'user/profile';
        // Has Auth Filter
    });
});

/*
Route::get('ProfitConversion', function () {
    return view('ProfitConversion');
});
*/