<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskModel;
use Validator;

class TaskController extends Controller
{
    public function getAllTasks(){

        return response()->json(TaskModel::get(), 200);
    }

    public function taskById($id){
        $task = TaskModel::find($id);
        if(is_null($task)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($task, 200);
    }

    public function taskCreate(Request  $request){
            $rules = [
                'name' => 'required|min:3',
                'active' => 'required|min:1|max:1',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
        $task = TaskModel:: create($request->all());
        return response()->json($task, 201);
    }

    public function taskUpdate(Request $request, $id){
        $task = TaskModel::find($id);
        if(is_null($task)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($task, 200);
    } 
    public function taskDelete(Request $request, $id){
        $task = TaskModel::find($id);
        if(is_null($task)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        $task->delete();
        return response()->json(null, 204);
    }
}
