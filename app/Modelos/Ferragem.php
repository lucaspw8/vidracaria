<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Ferragem extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','utilizacao','descricao','cor'];
     
}
