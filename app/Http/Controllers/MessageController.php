<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageModel;
use Validator;

class MessageController extends Controller
{
    public function getAllMessages(){

        return response()->json(MessageModel::get(), 200);
    }

    public function messageById($id){
        $message = MessageModel::find($id);
        if(is_null($message)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($message, 200);
    }

    public function messageCreate(Request  $request){
            $rules = [
                'phone' => 'required',
                'message' => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
        $message = MessageModel:: create($request->all());
        return response()->json($message, 201);
    }

    public function messageUpdate(Request $request, $id){
        $message = MessageModel::find($id);
        if(is_null($message)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($message, 200);
    } 
    public function messageDelete(Request $request, $id){
        $message = MessageModel::find($id);
        if(is_null($message)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        $message->delete();
        return response()->json(null, 204);
    }
}
