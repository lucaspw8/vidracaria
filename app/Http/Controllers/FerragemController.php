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

         $listaFerra = Ferragem::Paginate(10);
        return view('ferragemlist', compact('listaFerra'));
    }
    
public function create() {            

        
        return view('ferragemNew');
    }
    



    public function store(Request $r){
        $dados = $r->all();
        $verif = $this->ferragem->create($dados);
        
        if ($verif) {
            return redirect()->route('ferragem.index');
        } else {
            return redirect()->route('ferragem.create');
        }
    }

     public function show($id) {
        $ferragem = $this->ferragem->find($id);
       
        return view('ferragemEdit', compact('ferragem'));
        
       
     }

    
     public function update(Request $request, $id) {
        $dados = $request->all();
        $ferragem = $this->ferragem->find($id);
        $verif = $ferragem->update($dados);
        if ($verif){
            return redirect()->route('ferragem.index');
        }
        else{
            return redirect()->route('ferragem.edit');
        }
     }
     
      public function delete($id) {
        $ferragem = $this->ferragem->find($id);
        $verif = $ferragem->delete();
        
        if($verif){
            return redirect()->route('ferragem.index');
        }
        else{
            return redirect ()->route ('ferragem.show',$id);

        }
    }
    
     public function pesquisar(Request $nome){
          $listaFerra =$this->ferragem::where('utilizacao','like',$nome->buscar."%")->paginate(40);
          return  view('ferragemlist', compact('listaFerra'));
    }
}
