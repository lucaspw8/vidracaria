<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Outro extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','nome','valorCompra','valorVenda'];
     protected $hidden = ['espessura','tamanho'];

}
