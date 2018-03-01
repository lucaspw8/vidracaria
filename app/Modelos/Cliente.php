<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Endereco;
class Cliente extends Model
{
    
     public $timestamps = false;
     protected $fillable = ['id','nome','cpf','email','telefone'];
     protected $hidden = ['Endereco_idEndereco'];
     
     public function endereco(){
         return $this->hasOne(Endereco::class);
     }
}
