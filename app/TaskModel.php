<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = "task";
    // public $timestamps =false;
     protected $fillable = [
        'id',
        'name',
        'description',
        'active'
     ];
}