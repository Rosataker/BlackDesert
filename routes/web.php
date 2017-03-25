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


use App\ProfitConversion;
use Illuminate\Http\Request;



#Route::currentRouteName()
Route::group(array('as' => 'ProfitConversion::'), function()
{


    Route::get('ProfitConversion', function () {
        return view('ProfitConversion.view', [
            'ProfitConversion' => ProfitConversion::orderBy('created_at', 'asc')->get()
        ]);
        #return redirect()->route('ProfitConversion::view');
    })->name('View');

    /**
     * Add New Task
     */

    Route::post('/ProfitConversion', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);


        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        
        $ProfitConversion->name = $request->name;
        $ProfitConversion->save();

        
        
#        return redirect()->route('ProfitConversion::view');
    });

    /**
     * Delete Task
     */
    
    Route::delete('/ProfitConversion/{id}', function ($id) {
        ProfitConversion::findOrFail($id)->delete();

        return redirect()->route('ProfitConversion::view');
    });

});
