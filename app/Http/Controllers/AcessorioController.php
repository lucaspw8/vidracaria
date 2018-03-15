<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Acessorio;
use App\Modelos\Espessura;
use App\Modelos\Tamanho;
class AcessorioController extends Controller
{
    private $acessorio,$espessura,$tamanho;
    
    public function __construct(Acessorio $acessorio, Espessura $espessura, Tamanho $tamanho) {
        $this->acessorio = $acessorio;
        $this->espessura = $espessura;
        $this->tamanho   = $tamanho;
    }
    /**
     * Lista todos os Acessorios 
     * @return type
     */
    public function index(){
        $listaAcessorio = $this->acessorio::paginate(10);
        return view('AcessorioList', compact('listaAcessorio'));
    }
    
    public function create(){
       $listaEspessura = $this->espessura->all();
       $listaTamanho = $this->tamanho->all();
       return view('AcessorioCadastro', compact('listaEspessura','listaTamanho'));
    }
    /**
     * Cria um novo Acessorio
     * @param Request $request
     * @return type
     */
    public function store(Request $request){
        $dados = $request->all();
        
        //verifica se os dados do combo box de tamanho ou espessura foram selecionados
        if($dados['espessura']!='Espessura' && $dados['tamanho']=='Tamanho'){
            
            //logica de castro com Espessura
            $espessura = $this->espessura->find($dados['espessura']);
            $verif = $espessura->acessorio()->create($dados);
            
            if($verif){
               return redirect()->route('acessorio.index');
            }else{
                return redirect()->route('acessorio.create');
            }
        }elseif ($dados['espessura']=='Espessura' && $dados['tamanho']!='Tamanho') {
             //logica de castro com Tamanho
            dd('Tamanho informado = '.$dados['tamanho']);
        }else{
            dd("Informe um tamanho ou espessura");
        }   
//        $verif = $this->acessorio->create($dados);
//        if ($verif) {
//            return redirect()->route('teste');
//        } else {
//            return redirect()->route('teste');
//        }
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
