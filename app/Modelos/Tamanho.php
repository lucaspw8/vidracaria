<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Acessorio;
class Tamanho extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','tamanho'];
    
      //Relacionamento um para muitos
     public function acessorio(){
         return $this->hasMany(Acessorio::class);
     }
     
     //Relacionamento um para muitos com Outros
     public function outros(){
         return $this->hasMany(Outro::class);
     }
}
