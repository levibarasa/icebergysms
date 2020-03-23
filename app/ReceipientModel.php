<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceipientModel extends Model
{
    protected $table = "receipients";
    // public $timestamps =false;
     protected $fillable = [
        'id',
        'userid',
        'name',
        'phone',
        'email',
        'institutionid',
        'dateofbirth',
        'joindate',
        'active' 
     ];
}
