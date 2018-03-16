<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Tamanho;
use App\Modelos\Espessura;

class Acessorio extends Model
{
    public $timestamps = false;
     protected $fillable = ['id','tipo','valorCompra','valorVenda'];
     protected $hidden = ['tamanho_id','espessura_id'];
     
     /**
      * Função que retorna o tamanho do Acessorio
      * @return hasOne
      */
     public function Tamanho(){
         return $this->belongsTo(Tamanho::class);
     }
      /**
       * Função que retorna a espessura do Acessorio
       * @return type
       */
      public function Espessura(){
         return $this->belongsTo(Espessura::class);
     }
}
