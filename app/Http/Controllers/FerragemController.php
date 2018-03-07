<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Ferragem;
class FerragemController extends Controller
{
    private $ferragem;
    public function __construct(Ferragem $ferragem) {
        $this->ferragem = $ferragem;
    }
    
    public function index(){
        
    }

    public function store(Request $r){
        $dados = $r->all();
        $verif = $this->ferragem->create($dados);
        
        if ($verif) {
            return dd($dados);//redirect()->route('teste');
        } else {
            return redirect()->route('teste');
        }
    }
    
     public function update(Request $request, $id) {
        $dados = $request->all();
        $ferragem = $this->ferragem->find($id);
        $verif = $ferragem->update($dados);
        if ($verif){
            return redirect()->route('curso.index');
        }
        else{
            return redirect()->route('curso.edit');
        }
     }
     
      public function destroy($id) {
        $ferragem = $this->ferragem->find($id);
        $verif = $ferragem->delete();
        
        if($verif){
            return redirect()->route('curso.index', compact('menu'));
        }
        else{
            return redirect ()->route ('curso.show', compact('menu') ,$id)->with (['errors'=>'Erro ao Deletar']);
        }
    }
    
     public function listar(){
          $listaFerragem = $this->ferragem->all();
          return  $listaFerragem;
    }
}
