<?php

namespace App\Http\Controllers;
use App\Modelos\KitBox;
use Illuminate\Http\Request;
use App\Http\Requests\kitboxRequest;
class KitBoxController extends Controller
{
    private $kitbox;
    public function __construct(KitBox $kit) {
        $this->kitbox = $kit;
    }
    
     /**
     * Lista os kit e envia p tela inicial
     * @return type
     */
    public function index(){
        $listakitbox = $this->kitbox::paginate(10);
        return view('kitboxlist', compact('listakitbox'));
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
    
       public function show($id) {
        $kitbox = $this->kitbox->find($id);
        return view('kitboxedit', compact('kitbox'));
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
