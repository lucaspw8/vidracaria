<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Tamanho extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','tamanho'];
     
}
