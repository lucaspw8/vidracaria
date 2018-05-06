<?php

namespace App\Http\Controllers;
use App\Modelos\Espessura;
use App\Modelos\Tamanho;
use App\Modelos\Outro;
use Illuminate\Http\Request;

class OutrosController extends Controller
{
    private $outro,$espessura,$tamanho;
    
    function __construct(Outro $outro, Espessura $espessura, Tamanho $tamanho) {
        $this->outro = $outro;
        $this->espessura = $espessura;
        $this->tamanho = $tamanho;
    }

   /**
    * Lista todos os materiais do tipo Outro
    * @return view
    */     
   public function index(){
  
        $listaOutros = $this->outro::paginate(20);
        return view('OutroList', compact('listaOutros'));
    }
}
