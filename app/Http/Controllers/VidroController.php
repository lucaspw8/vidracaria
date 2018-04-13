<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Vidro;
class VidroController extends Controller
{
    private $vidro;
    public function __construct(Vidro $vidro) {
        $this->vidro = $vidro;
    }
    
    
    public function index(){

         $listaVidro = Vidro::Paginate(10);
        return view('vidrolist', compact('listaVidro'));
    }
    
public function create() {            

        
        return view('vidronew');
    }
    



    public function store(Request $r){
        $dados = $r->all();
        $verif = $this->vidro->create($dados);
        
        if ($verif) {
            return redirect()->route('vidro.index');
        } else {
            return redirect()->route('vidro.create');
        }
    }

     public function show($id) {
        $vidro = $this->vidro->find($id);
       
        return view('vidroEdit', compact('vidro'));
        
       
     }

    
     public function update(Request $request, $id) {
        $dados = $request->all();
        $vidro = $this->vidro->find($id);
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
