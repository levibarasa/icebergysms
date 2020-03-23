<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceModel extends Model
{
    protected $table = "price";
    // public $timestamps =false;
     protected $fillable = [
        'id',
        'subscriptionname',
        'description',
        'buyingpricerate',
        'sellingpricerate',
        'startdate',
        'enddate',
        'active'
     ];
}
