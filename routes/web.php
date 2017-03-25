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
Route::group(['middleware' => 'web'], function()
{

    Route::get('ProfitConversion', function () {
        return view('ProfitConversion.view', [
            'ProfitConversion_view' => ProfitConversion::orderBy('created_at', 'asc')->get()
        ]);
    })->name('ProfitConversion_View');


    Route::post('/ProfitConversion', function (Request $request) {


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('ProfitConversion_View')
                ->withInput()
                ->withErrors($validator);
        }

        $ProfitConversionClass = ($request->id) ? ProfitConversion::find($request->id) : new ProfitConversion;



        $ProfitConversionClass->name = $request->name;
        $ProfitConversionClass->price = $request->price;
        $ProfitConversionClass->amount = $request->amount;        
        $ProfitConversionClass->save();

        return redirect()->route('ProfitConversion_View');
    });
    
    Route::delete('/ProfitConversion/{id}', function ($id) {
        ProfitConversion::findOrFail($id)->delete();
        #$deleted = DB::delete('delete from users');
        return redirect()->route('ProfitConversion_View');
    });
    
    Route::get('/ProfitConversion/{id}', function ($id) {
        return view('ProfitConversion.view', [
            'ProfitConversion_edit' => ProfitConversion::where('id', ['id' => $id])->get(),
            'button_str' => 'Edit ProfitConversion'
        ]);
    });    

});
