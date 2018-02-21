<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Acessorio;
class AcessorioController extends Controller
{
    private $acessorio;
    
    public function __construct(Acessorio $acessorio) {
        $this->acessorio = $acessorio;
    }
    /**
     * Lista todos os Acessorios 
     * @return type
     */
    public function index(){
        $listaAcessorio = $this->acessorio->all();
        return  $listaAcessorio;
    }
    
    public function create(){
        
    }
    /**
     * Cria um novo Acessorio
     * @param Request $request
     * @return type
     */
    public function store(Request $request){
        $dados = $request->all();
        $verif = $this->acessorio->create($dados);
        if ($verif) {
            return redirect()->route('teste');
        } else {
            return redirect()->route('teste');
        }
    }
    
     public function show($id) {
        $acessorio = $this->acessorio->find($id);
        return view('clienteShow', compact('acessorio'));
        
     }
    
    /**
     * Edita um Acessorio
     * @param Request $request
     * @param type $id
     * @return type
     */
     public function update(Request $request, $id) {
      
        $dados = $request->all();
        $acessorio = $this->acessorio->find($id);
        $verif = $acessorio->update($dados);
        if ($verif){
            return redirect()->route('curso.index');
        }
        else{
            return redirect()->route('curso.edit');
        }
    }
    
    /**
     * Remove um Acessorio
     * @param type $id
     * @return type
     */
    
    public function destroy($id) {
        $acessorio = $this->acessorio->find($id);
        $verif = $acessorio->delete();
        
        if($verif){
            return redirect()->route('curso.index', compact('menu'));
        }
        else{
            return redirect ()->route ('curso.show', compact('menu') ,$id)->with (['errors'=>'Erro ao Deletar']);
        }
    }
}
