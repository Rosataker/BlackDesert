<?php

namespace App\Http\Controllers;

use App\ProfitConversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfitConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ProfitConversion.view', [
            'ProfitConversion_Class' => ProfitConversion::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('ProfitConversion.view',[
            'status'=>1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

/*
        if(is_array($request->rawmaterial)){
            foreach ($request->rawmaterial as $key => $value) {
               $RawmaterialSaveData[$key]=$value;
            }
            $RawmaterialSaveData=serialize($RawmaterialSaveData);

        }
        */
       //         var_dump($RawmaterialSaveData);
      //  exit;

        $ProfitConversionClass = ($request->id) ? ProfitConversion::find($request->id) : new ProfitConversion;
        $ProfitConversionClass->name = $request->name;
        $ProfitConversionClass->price = $request->price;
        $ProfitConversionClass->amount = $request->amount;
        $ProfitConversionClass->count = ($request->count) ? $request->count : '' ;
        $ProfitConversionClass->updated_at = date_timestamp_get(date_create());
        $ProfitConversionClass->rawmaterial = '';
        $ProfitConversionClass->save();

        return redirect()->action('ProfitConversionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ProfitConversion.view', [
            'ProfitConversion_edit' => ProfitConversion::where('id', ['id' => $id])->get(),
            'button_str' => 'Edit ProfitConversion',
            'status'=>1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProfitConversion::findOrFail($id)->delete();
        return redirect()->action('ProfitConversionController@index');
    }
}
