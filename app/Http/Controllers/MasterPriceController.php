<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterPriceModel;
use Validator;

class MasterPriceController extends Controller
{
    public function getAllMasterPrices(){

        return response()->json(MasterPriceModel::get(), 200);
    }

    public function masterPriceById($id){
        $masterPrice = MasterPriceModel::find($id);
        if(is_null($masterPrice)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($masterPrice, 200);
    }

    public function masterPriceCreate(Request  $request){
            // $rules = [
            //     'insitutionname' => 'required|min:3',
            //     'active' => 'required|min:1|max:1',
            // ];
            // $validator = Validator::make($request->all(),$rules);
            // if($validator->fails()){
            //     return response()->json($validator->errors(),400);
            // }
        $masterPrice = MasterPriceModel:: create($request->all());
        return response()->json($masterPrice, 201);
    }

    public function masterPriceUpdate(Request $request, $id){
        $masterPrice = MasterPriceModel::find($id);
        if(is_null($masterPrice)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($masterPrice, 200);
    } 
    public function masterPriceDelete(Request $request, $id){
        $masterPrice = MasterPriceModel::find($id);
        if(is_null($masterPrice)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        $masterPrice->delete();
        return response()->json(null, 204);
    }
}
