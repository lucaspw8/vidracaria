<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
     public $timestamps = false;
     protected $fillable = ['id','nome','cpf','email','telefone'];
     protected $hidden = ['Endereco_idEndereco'];
}
