<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
            public function login(){     
                if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
                    $user = Auth::user(); 
                    $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                    $user['token'] =  $user->createToken('MyApp')-> accessToken;
                    $user['status'] = $this-> successStatus;
                    return response()->json(['success' => $user], $this-> successStatus); 
                } 
                else{ 
                    return response()->json(['error'=>'Unauthorised'], 401); 
                } 
            }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
                public function register(Request $request) 
                { 
                            $validator = Validator::make($request->all(), [ 
                                'username' => 'required', 
                                'email' => 'required|email', 
                                'password' => 'required', 
                                'c_password' => 'required|same:password', 
                            ]);
                    if ($validator->fails()) { 
                                return response()->json(['error'=>$validator->errors()], 401);            
                            }
                    $input = $request->all(); 
                            $input['password'] = bcrypt($input['password']); 
                            $user = User::create($input); 
                            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                            $success['username'] =  $user->username;
                    return response()->json(['success'=>$success], $this-> successStatus); 
                }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
    public function logout(Request $request) 
    { 
        $request->user()->tockens()->revoke();  
        return response()->json(['success'=> 'Logout Successful'], $this-> successStatus); 
    }
    public function getAllUsers(){
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return response()->json($users, 200);
    }
    public function userById($userid){
        $user = User::find($userid);
        if(is_null($user)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($user, 200);
    }
    public function userUpdate(Request $request, $userid){
        $user = User::find($userid);
        if(is_null($user)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        return response()->json($user, 200);
    } 
    public function userDelete(Request $request, $userid){
        $user = User::find($userid);
        if(is_null($user)){
            return response()->json(["message" => "Record Not found"], 404);
        }
        $user->delete();
        return response()->json(null, 204);
    }
}
