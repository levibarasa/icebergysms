<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    protected $table = "messages";
    // public $timestamps =false;
     protected $fillable = [
        'id',
        'userid',
        'message',
        'phone',
        'sentdate',
        'sendername',
        'active'
     ];
}
