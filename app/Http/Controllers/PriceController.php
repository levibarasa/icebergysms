<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceModel;
use Validator;

class PriceController extends Controller
{
    public function getAllPrices(){

        return response()->json(PriceModel::get(), 200);
    }

    public function priceById($id){
        $price = PriceModel::find($id);
        if(is_null($price)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($price, 200);
    }

    public function priceCreate(Request  $request){
            $rules = [
                'subscriptionname' => 'required|min:3',
                'active' => 'required|min:1|max:1',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
        $price = PriceModel:: create($request->all());
        return response()->json($price, 201);
    }

    public function priceUpdate(Request $request, $id){
        $price = PriceModel::find($id);
        if(is_null($price)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($price, 200);
    } 
    public function priceDelete(Request $request, $id){
        $price = PriceModel::find($id);
        if(is_null($price)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        $price->delete();
        return response()->json(null, 204);
    }
}
