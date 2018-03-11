<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Espessura;
class EspessuraController extends Controller
{
    private $espessura;
    
    public function __construct(Espessura $espe) {
        $this->espessura = $espe;
    }
    
    /**
     * Lista todos as Espessuras
     * @return type
     */
    public function index(){
        $listaEspessura = $this->espessura::paginate(3);
        return view('espessura', compact('listaEspessura'));
    }
    
    public function create(){
        
    }
    /**
     * Cria uma nova Espessura
     * @param Request $request
     * @return type
     */
    public function store(Request $request){
        $dados = $request->all();
        $verif = $this->espessura->create($dados);
        if ($verif) {
            return redirect()->route('espessura.index');
        } else {
            return redirect()->route('espessura.index')->with (['errors'=>'Erro ao cadastrar']);
        }
    }
    
     public function show($id) {
        $espess = $this->espessura->find($id);
        $listaEspessura = $this->espessura::paginate(3);
        return view('espessuraEdit', compact('espess','listaEspessura'));
        
     }
    
    /**
     * Edita uma Espessura
     * @param Request $request
     * @param type $id
     * @return type
     */
     public function update(Request $request, $id) {
      
        $dados = $request->all();
        $espessura = $this->espessura->find($id);
        $verif = $espessura->update($dados);
        if ($verif){
            return redirect()->route('espessura.show', compact('id'));
        }
        else{
            return redirect()->route('espessura.show', compact('id'));
        }
    }
    
    /**
     * Remove uma Espessura
     * @param type $id
     * @return type
     */
    
    public function delete($id){
        $espessura = $this->espessura->find($id);
        $verif = $espessura->delete();
        
        if($verif){
            return redirect()->route('espessura.index');
        }
        else{
            return redirect ()->route ('espessura.index')->with (['errors'=>'Erro ao Deletar']);
        }
    }


    public function destroy() {
      
    }
    
     public function listar(){
          $listaEspessura = $this->espessura->all();
          return  $listaEspessura;
    }
}
