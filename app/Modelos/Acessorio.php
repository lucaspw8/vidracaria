<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Tamanho;
use App\Modelos\Espessura;

class Acessorio extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','tipo','valorCompra','valorVenda'];
     protected $hidden = ['tamanho','espessura'];
     
     /**
      * Função que retorna o tamanho do Acessorio
      * @return hasOne
      */
     public function Tamanho(){
         return $this->hasOne(Tamanho::class);
     }
      /**
       * Função que retorna a espessura do Acessorio
       * @return type
       */
      public function Espessura(){
         return $this->hasOne(Espessura::class);
     }
}
