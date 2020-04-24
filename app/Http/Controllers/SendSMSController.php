<?php

namespace App\Http\Controllers;

use AfricasTalking\SDK\AfricasTalking; 
use Illuminate\Http\Request; 
use App\MessageModel;
use Validator;

class SendSMSController extends Controller
{  
    private $username ="";
    private $apiKey="";
    private $AT="";
    private $sms="";  
    
    public function __construct(){
        $this->username = "BACYSMS";
        $this->apiKey = "df7520978a88e8faf780f5c0ad23fee99b1d3f053c374b11490e16cee7ee77f6";
        $this->AT = new AfricasTalking($this->username, $this->apiKey); 
        $this->sms = $this->AT->sms();
        }
       
            public function sendSms(Request $request){
                $rules = [
                    'phone' => 'required',
                    'message' => 'required',
                ];
                $validator = Validator::make($request->all(),$rules);
                if($validator->fails()){
                    return response()->json($validator->errors(),400);
                }
                $recipients  = $request->input('phone');
                $message   = $request->input('message');  
                //$from       = "BACY"; 
            try { 
                $result = $this->sms->send([
                    'to'      => $recipients,
                    'message' => $message,
                    //'from'    => $from
                ]);  
                         $message = MessageModel:: create($request->all());
                //print_r($result);
                return response()->json([$result,'message' => $message], 200);
            } catch (Exception $e) {
                //echo "Error: ".$e->getMessage();
                return response()->json($e->getMessage(), 500);
            }
            
        }
}
