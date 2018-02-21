<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     public $timestamps = false;
     protected $fillable = ['id','descricao','data_pedido','hora_pedido'];
     protected $hidden = ['idCliente'];
}
