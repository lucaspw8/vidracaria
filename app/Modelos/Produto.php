<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','nome','descricao'];
     
}
