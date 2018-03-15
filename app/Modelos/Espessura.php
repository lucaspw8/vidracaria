<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Acessorio;
class Espessura extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','espessura'];
     
     //Relacionamento um para muitos
     public function acessorio(){
         return $this->hasMany(Acessorio::class);
     }
}
