<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Acessorio;
use App\Modelos\Vidro;
use App\Modelos\Outro;
class Espessura extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','espessura'];
     
     //Relacionamento um para muitos com acessorio
     public function acessorio(){
         return $this->hasMany(Acessorio::class);
     }
     
     //Relacionamento um para muitos com vidro
     public function vidro(){
         return $this->hasMany(Vidro::class);
     }
     
     //Relacionamento um para muitos com Outros
     public function outros(){
         return $this->hasMany(Outro::class);
     }
}
