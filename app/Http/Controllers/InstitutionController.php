<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\InstitutionModel;
use Validator;

class InstitutionController extends Controller
{
    public function getAllInstitutions(){
        $institution = InstitutionModel::orderBy('created_at', 'desc')->paginate(5);
        return response()->json($institution, 200);
    }

    public function institutionById($institutionid){
        //$institution = InstitutionModel::find($institutionid);
        $institution = InstitutionModel::query()->where('institutionid', $institutionid)->first();
        if(is_null($institution)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($institution, 200);
    }

    public function institutionCreate(Request  $request){
            $rules = [
                'insitutionname' => 'required|min:3',
                'active' => 'required|min:1|max:1',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
        $institution = InstitutionModel:: create($request->all());
        return response()->json($institution, 201);
    }

    public function institutionUpdate(Request $request, $institutionid){
        $institution = InstitutionModel::find($institutionid);
        if(is_null($institution)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($institution, 200);
    } 
    public function institutionDelete(Request $request, $institutionid){
        $institution = InstitutionModel::find($institutionid);
        if(is_null($institution)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        $institution->delete();
        return response()->json(null, 204);
    }
}  