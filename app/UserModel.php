<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; 

class UserModel extends Authenticatable {
   use Notifiable;

    protected $table = "user";
    // public $timestamps =false;
     protected $fillable = [
        'userid',
        'name',
        'insitutionid',
        'taskid',
        'phone',
        'email',
        'dateofbirth',
        'joindate',
        'accesslevel',
        'password',
        'active' 
     ];

     
    protected $hidden = [
      'password', 'remember_token',
  ];
}