<?php

namespace App\Http\Controllers;
use App\Modelos\Kit_Box;
use Illuminate\Http\Request;

class KitBoxController extends Controller
{
    private $kitbox;
    public function __construct(Kit_Box $kit) {
        $this->kitbox = $kit;
    }
    
     /**
     * Lista os kit e envia p tela inicial
     * @return type
     */
    public function index(){
        $listaKitbox = $this->kitbox::paginate(10);
        return view('kitbox', compact('listaKitbox'));
    }
    
     public function create() {
          return view('kitboxCadastro');
    }
    
    public function store(Request $r){
        $dados = $r->all();
        $verif = $this->kitbox->create($dados);
        
        if ($verif) {
            return redirect()->route('kitbox.index');
        } else {
            return redirect()->route('kitbox.create');
        }
    }
    
    public function update(Request $request, $id) {
        $dados = $request->all();
        $kitbox = $this->kitbox->find($id);
        $verif = $kitbox->update($dados);
        if ($verif){
            return redirect()->route('kitbox.index');
        }
        else{
            return redirect()->route('kitbox.edit');
        }
     }
     
     
      public function delete($id) {
        $kitbox = $this->kitbox->find($id);
        $verif = $kitbox->delete();
        
        if($verif){
            return redirect()->route('kitbox.index');
        }
        else{
            return redirect ()->route ('kitbox.show',$id)->with (['errors'=>'Erro ao Deletar']);
        }
    }
}
