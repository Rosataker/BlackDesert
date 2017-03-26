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
Route::group(['middleware' => 'web'], function(){

    Route::get('/ProfitConversion', function (  ) {
        return view('ProfitConversion.view', [
            'ProfitConversion_Class' => ProfitConversion::orderBy('created_at', 'desc')->paginate(5),
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
        $ProfitConversionClass->count = ($request->count) ? $request->count : '' ;
        $ProfitConversionClass->save();

        return redirect()->route('ProfitConversion_View');
    });

    Route::get('/ProfitConversion/add', function () {
        return view('ProfitConversion.view',[
            'status'=>1,
        ]);
    });

    Route::get('/ProfitConversion/edit/{id}', function ($id) {
        return view('ProfitConversion.view', [
            'ProfitConversion_edit' => ProfitConversion::where('id', ['id' => $id])->get(),
            'button_str' => 'Edit ProfitConversion',
            'status'=>1,
        ]);
    });
    
    Route::delete('/ProfitConversion/del/{id}', function ($id) {
        ProfitConversion::findOrFail($id)->delete();
        return redirect()->route('ProfitConversion_View');
    });
    


});
