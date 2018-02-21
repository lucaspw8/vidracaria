<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Kit_Box extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','metragem','cor','folhas'];
     
}
