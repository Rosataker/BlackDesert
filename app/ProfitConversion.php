<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitConversion extends Model
{
     protected $table = 'ProfitConversion';


/*   
	#方向錯誤留下來的東西，先留著當參考
     public function EditView ($id){
     	$ret = ProfitConversion::where('id', ['id' => $id])->get();
     //	$ret = "aaaaa";
     	return $ret;
     }
     #'ProfitConversion_edit' =>$ProfitConversionClass->EditView($id)
*/
}
