<?php

namespace App\Http\Controllers;
use App\Modelos\Espessura;
use App\Modelos\Tamanho;
use App\Modelos\Outro;
use Illuminate\Http\Request;

class OutrosController extends Controller
{
    private $outro,$espessura,$tamanho;
    
    function __construct(Outro $outro, Espessura $espessura, Tamanho $tamanho) {
        $this->outro = $outro;
        $this->espessura = $espessura;
        $this->tamanho = $tamanho;
    }

   /**
    * Lista todos os materiais do tipo Outro
    * @return view
    */     
   public function index(){
  
        $listaOutros = $this->outro::paginate(20);
        return view('OutroList', compact('listaOutros'));
    }
    
    public function create(){
       $listaEspessura = $this->espessura->all();
       $listaTamanho = $this->tamanho->all();
       return view('OutrosCadastro', compact('listaEspessura','listaTamanho'));
    }
    
     /**
     * Cria um novo Outro
     * @param Request $request
     * @return type
     */
    public function store(Request $request){
        $dados = $request->all();
        //verifica se os dados do combo box de tamanho ou espessura foram selecionados
        if($dados['espessura']!= 0 && $dados['tamanho']== 0){
            
            //logica de castro com Espessura
            $espessura = $this->espessura->find($dados['espessura']);
            $verif = $espessura->outros()->create($dados);
            
            if($verif){
               return redirect()->route('outro.index');
            }else{
                return redirect()->route('outro.create');
            }
        }elseif($dados['tamanho']!= 0 && $dados['espessura']== 0) {
            
           //logica de castro com Tamanho
            $tamanho = $this->tamanho->find($dados['tamanho']);
            $verif = $tamanho->outros()->create($dados);
            
            if($verif){
               return redirect()->route('outro.index');
            }else{
                return redirect()->route('outro.create');
            }
            
        }else{
           
           return redirect()->route('outro.create');
        }  
    }
    
    /**
     * Responsavel por exibir a tela de editar Outros
     * @param type $id
     * @return type
     */
    public function show($id) {
        $outros = $this->outro->find($id);
        $listaEspessura = $this->espessura->all();
        $listaTamanho = $this->tamanho->all();
        return view('OutroEdit', compact('outros','listaEspessura','listaTamanho'));
        
     }
     
     /**
     * Edita Outro
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function update(Request $request, $id) {
      $dados = $request->all(); 
        if($dados['espessura']!= 0 && $dados['tamanho']== 0){
        //logica de atualizar com Espessura
           $outros = $this->outro->find($id);
           $outros->Espessura()->dissociate();           
           $espessura = $this->espessura->find($dados["espessura"]);
           $outros->Espessura()->associate($espessura);
           $verif = $outros->update($dados);
                    
            
        }elseif($dados['tamanho']!= 0 && $dados['espessura']== 0){
            //logica de atualizar com Tamanho
           $outros = $this->outro->find($id);
           $outros->Tamanho()->dissociate();           
           $tamanho = $this->tamanho->find($dados["tamanho"]);
           $outros->Tamanho()->associate($tamanho);
           $verif = $outros->update($dados);          
                   
        }
        
        if($verif){
               return redirect()->route('outro.index');
        }else{
            return redirect()->route('outro.update',$id);
        }
    }
    
     /**
     * Remove Outro
     * @param type $id
     * @return type
     */
    
    public function delete($id) {
        $outro = $this->outro->find($id);
        $verif = $outro->delete();
        
        if($verif){
            return redirect()->route('outro.index');
        }
        else{
            return redirect ()->route ('outro.index')->with (['errors'=>'Erro ao Deletar']);
        }
    }
    
}
