<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionModel extends Model
{
    protected $table = "Institution";
   // public $timestamps =false;
    protected $fillable = [
        'institutionid',
        'insitutionname',
        'address',
        'location',
        'phone',
        'senderName',
        'email',
        'joindate',
        'active' 
    ];
}