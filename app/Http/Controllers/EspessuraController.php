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
        $listaEspessura = $this->espessura->all();
        return  $listaEspessura;
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
            return redirect()->route('teste');
        } else {
            return redirect()->route('teste');
        }
    }
    
     public function show($id) {
        $espessura = $this->espessura->find($id);
        return view('clienteShow', compact('espessura'));
        
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
            return redirect()->route('curso.index');
        }
        else{
            return redirect()->route('curso.edit');
        }
    }
    
    /**
     * Remove uma Espessura
     * @param type $id
     * @return type
     */
    
    public function destroy($id) {
        $espessura = $this->espessura->find($id);
        $verif = $espessura->delete();
        
        if($verif){
            return redirect()->route('curso.index', compact('menu'));
        }
        else{
            return redirect ()->route ('curso.show', compact('menu') ,$id)->with (['errors'=>'Erro ao Deletar']);
        }
    }
}
