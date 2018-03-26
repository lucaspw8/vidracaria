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
<<<<<<< HEAD
         $listaFerra = Ferragem::Paginate(10);
        return view('ferragemlist', compact('listaFerra'));
    }
    
public function create() {
          return view('ferragemNew');
    }
=======
        $listaFerragem = $this->ferragem::paginate(10);
        return view('ferragem', compact('listaFerragem'));
    }
    
     public function create() {
          return view('ferragemNew');
    }

>>>>>>> ae8943c809f6206ff9dbd2f1eb5fffb04347e86b

    public function store(Request $r){
        $dados = $r->all();
        $verif = $this->ferragem->create($dados);
        
        if ($verif) {
            return redirect()->route('ferragem.index');
        } else {
<<<<<<< HEAD
            return redirect()->route('ferragem.index');
=======
            return redirect()->route('ferragem.create');
>>>>>>> ae8943c809f6206ff9dbd2f1eb5fffb04347e86b
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
<<<<<<< HEAD
            return redirect()->route('ferragem.index');
        }
        else{
            return redirect ()->route ('ferragem.show',$id);
=======
            return redirect()->route('curso.index');
        }
        else{
            return redirect ()->route ('curso.show',$id)->with (['errors'=>'Erro ao Deletar']);
>>>>>>> ae8943c809f6206ff9dbd2f1eb5fffb04347e86b
        }
    }
    
     public function listar(){
          $listaFerragem = $this->ferragem->all();
          return  $listaFerragem;
    }
}
