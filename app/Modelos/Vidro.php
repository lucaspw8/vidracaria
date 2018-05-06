<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Vidro extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','cor','valorCompra','valorVenda'];
     protected $hidden = ['espessura_idespessura'];
     
      public function Espessura(){
         return $this->belongsTo(Espessura::class);
     }
}
