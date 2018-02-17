<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Acessorio extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','tipo','valorCompra','valorVenda'];
     protected $hidden = ['tamanho','espessura'];
}
