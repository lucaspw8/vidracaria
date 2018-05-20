<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Outro extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','nome','valorCompra','valorVenda'];
     protected $hidden = ['espessura','tamanho'];
     
      public function Tamanho(){
         return $this->belongsTo(Tamanho::class);
     }
      
     
     public function Espessura(){
         return $this->belongsTo(Espessura::class);
     }

}
