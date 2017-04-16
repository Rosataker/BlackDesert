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
        if(session()->has('search_str')){
            $search_str=session()->get('search_str');
            $ProfitConversion_Class=ProfitConversion::where('name','like','%'.$search_str[0].'%')
            ->orderBy('created_at', 'desc')->paginate(5);

        }else{
            $ProfitConversion_Class=ProfitConversion::orderBy('created_at', 'desc')->paginate(5);    
        }


        

        foreach ($ProfitConversion_Class as $key => $ProfitConversion_View) {
            $rawmaterialData=unserialize($ProfitConversion_View->rawmaterial);
            if(is_array($rawmaterialData)){
                $ret = $Recont='';
                foreach ($rawmaterialData as $Nullkey => $value) {
                    $Recont = '原料：<font color=red>'.$value['name'] . '</font> <BR> 金額：<font color=red>' . $value['price'] . '</font><BR><HR>';
                    $ret=$ret. $Recont ;
                }
                $ProfitConversion_Class[$key]->rawmaterial=$ret;
            }
        }
        return view('ProfitConversion.view', [
            'ProfitConversion_Class' => $ProfitConversion_Class,
            'search_str' => $search_str[0],

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


        if(is_array($request->rawmaterial)){
            foreach ($request->rawmaterial as $key => $value) {
               $RawmaterialSaveData[$key]=$value;
            }
            $RawmaterialSaveData=serialize($RawmaterialSaveData);

        }


        $ProfitConversionClass = ($request->id) ? ProfitConversion::find($request->id) : new ProfitConversion;
        $ProfitConversionClass->name = $request->name;
        $ProfitConversionClass->price = $request->price;
        $ProfitConversionClass->amount = $request->amount;
        $ProfitConversionClass->count = ($request->count) ? $request->count : '' ;
        $ProfitConversionClass->updated_at = date_timestamp_get(date_create());
        $ProfitConversionClass->rawmaterial = (@$RawmaterialSaveData) ? $RawmaterialSaveData : '' ;;
        $ProfitConversionClass->save();

        return redirect()->action('ProfitConversionController@index');
    }

    public function search(Request $request)
    {            
        $request->session()->forget('search_str');
        $request->session()->push('search_str', $request->search_str);
        return redirect()->action("ProfitConversionController@index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

       $ProfitConversion_edit= ProfitConversion::where('id', ['id' => $id])->get();
       $ProfitConversion_edit=$ProfitConversion_edit[0];

       $rawmaterialData=unserialize($ProfitConversion_edit->rawmaterial);

        return view('ProfitConversion.view', [
            'ProfitConversion_edit' => $ProfitConversion_edit,
            'button_str' => 'Edit ProfitConversion',
            'status'=>1,
            'rawmaterialData'=>$rawmaterialData,
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
