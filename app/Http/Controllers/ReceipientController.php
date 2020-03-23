<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReceipientModel;
use Validator;

class ReceipientController extends Controller
{
    public function getAllReceipients(){

        return response()->json(ReceipientModel::get(), 200);
    }

    public function receipientById($id){
        $receipient = ReceipientModel::find($id);
        if(is_null($receipient)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($receipient, 200);
    }

    public function receipientCreate(Request  $request){
            $rules = [
                'insitutionname' => 'required|min:3',
                'active' => 'required|min:1|max:1',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
        $receipient = ReceipientModel:: create($request->all());
        return response()->json($receipient, 201);
    }

    public function receipientUpdate(Request $request, $id){
        $receipient = ReceipientModel::find($id);
        if(is_null($receipient)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($receipient, 200);
    } 
    public function receipientDelete(Request $request, $id){
        $receipient = ReceipientModel::find($id);
        if(is_null($receipient)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        $receipient->delete();
        return response()->json(null, 204);
    }
}
