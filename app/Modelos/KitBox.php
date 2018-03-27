<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class KitBox extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','metragem','cor','folhas'];
     
}
