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
  
        $listaAcessorio = $this->acessorio::paginate(20);
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
        if($dados['espessura']!= 0 && $dados['tamanho']== 0){
            
            //logica de castro com Espessura
            $espessura = $this->espessura->find($dados['espessura']);
            $verif = $espessura->acessorio()->create($dados);
            
            if($verif){
               return redirect()->route('acessorio.index');
            }else{
                return redirect()->route('acessorio.create');
            }
        }elseif($dados['tamanho']!= 0 && $dados['espessura']== 0) {
            
           //logica de castro com Tamanho
            $tamanho = $this->tamanho->find($dados['tamanho']);
            $verif = $tamanho->acessorio()->create($dados);
            
            if($verif){
               return redirect()->route('acessorio.index');
            }else{
                return redirect()->route('acessorio.create');
            }
            
        }else{
           
           return redirect()->route('acessorio.create');
        }
    
      
    }
    
     public function show($id) {
        $acessorio = $this->acessorio->find($id);
        $listaEspessura = $this->espessura->all();
        $listaTamanho = $this->tamanho->all();
        return view('AcessorioEdit', compact('acessorio','listaEspessura','listaTamanho'));
        
     }
    
    /**
     * Edita um Acessorio
     * @param Request $request
     * @param type $id
     * @return type
     */
     public function update(Request $request, $id) {
      
        $dados = $request->all(); 
        if($dados['espessura']!= 0 && $dados['tamanho']== 0){
        //logica de atualizar com Espessura
           $acessorio = $this->acessorio->find($id);
           $acessorio->Espessura()->dissociate();           
           $espessura = $this->espessura->find($dados["espessura"]);
           $acessorio->Espessura()->associate($espessura);
           $verif = $acessorio->update($dados);
           
            
            if($verif){
               return redirect()->route('acessorio.index');
            }else{
                return redirect()->route('acessorio.update',$id);
            }
        }elseif($dados['tamanho']!= 0 && $dados['espessura']== 0){
            //logica de atualizar com Tamanho
           $acessorio = $this->acessorio->find($id);
           $acessorio->Tamanho()->dissociate();           
           $tamanho = $this->tamanho->find($dados["tamanho"]);
           $acessorio->Tamanho()->associate($tamanho);
           $verif = $acessorio->update($dados);
           
            
            if($verif){
               return redirect()->route('acessorio.index');
            }else{
                return redirect()->route('acessorio.update',$id);
            }
        }else{
            return redirect()->route('acessorio.update',$id);
        }
    }
    
    /**
     * Remove um Acessorio
     * @param type $id
     * @return type
     */
    
    public function delete($id) {
        $acessorio = $this->acessorio->find($id);
        $verif = $acessorio->delete();
        
        if($verif){
            return redirect()->route('acessorio.index');
        }
        else{
            return redirect ()->route ('acessorio.index')->with (['errors'=>'Erro ao Deletar']);
        }
    }
    
    public function pesquisar(Request $tipo){
         $listaAcessorio = $this->acessorio::where('tipo','like',$tipo->buscar."%")->paginate(40);
         return view('AcessorioList', compact('listaAcessorio'));
    }
}
