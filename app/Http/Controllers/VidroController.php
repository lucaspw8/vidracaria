<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Vidro;
use App\Modelos\Espessura;
class VidroController extends Controller
{
    private $vidro,$espessura;
    public function __construct(Vidro $vidro,Espessura $espessura) {
        $this->vidro = $vidro;
        $this->espessura = $espessura;
        
    }
    
    
    public function index(){

         $listaVidro = Vidro::Paginate(10);
        return view('vidrolist', compact('listaVidro'));
    }
    
public function create() {            

        $listaEspessura = $this->espessura->all();
        return view('vidronew', compact("listaEspessura"));
    }
    



    public function store(Request $r){
        $dados = $r->all();
        
        $espessura = $this->espessura->find($dados['espessura']);
        $verif = $espessura->vidro()->create($dados);
        
        if ($verif) {
            return redirect()->route('vidro.index');
        } else {
            return redirect()->route('vidro.create');
        }
    }

     public function show($id) {
        $vidro = $this->vidro->find($id);
        $listaEspessura = $this->espessura->all();

        return view('vidroEdit', compact('vidro','listaEspessura'));
        
       
     }

    
     public function update(Request $request, $id) {
        $dados = $request->all();
        $vidro = $this->vidro->find($id);
        $vidro->Espessura()->dissociate();
        $espessura = $this->espessura->find($dados['espessura']);
        $vidro->Espessura()->associate($espessura);
        $verif = $vidro->update($dados);
        if ($verif){
            return redirect()->route('vidro.index');
        }
        else{
            return redirect()->route('vidro.edit');
        }
     }
     
      public function delete($id) {
        $vidro = $this->vidro->find($id);
        $verif = $vidro->delete();
        
        if($verif){
            return redirect()->route('vidro.index');
        }
        else{
            return redirect ()->route ('vidro.show',$id);

        }
    }
    
     public function pesquisar(Request $nome){
          $listaVidro =$this->vidro::where('Cor','like',$nome->buscar."%")->paginate(40);
          return  view('vidrolist', compact('listaVidro'));
    }
}
