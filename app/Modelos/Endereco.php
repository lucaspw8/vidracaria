<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','logradouro','bairro','numero','cidade'];
     protected $hidden = ['updated_at','created_at'];
}
