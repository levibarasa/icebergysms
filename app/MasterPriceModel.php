<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPriceModel extends Model
{
    protected $table = "masterprices";
    // public $timestamps =false;
     protected $fillable = [
        'id',
        'userid',
        'nofsentmessages',
        'sentdate',
        'totalbuyingprice',
        'totalsellingprice',
        'active'
     ];
}
