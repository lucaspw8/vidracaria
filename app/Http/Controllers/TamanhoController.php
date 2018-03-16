<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Tamanho;
class TamanhoController extends Controller
{
     private $tamanho;
    
    public function __construct(Tamanho $tamanho) {
        $this->tamanho = $tamanho;
    }
    
    /**
     * Lista todos as Espessuras
     * @return type
     */
    public function index(){
        $listaTamanho = $this->tamanho::paginate(3);
        return view('tamanho', compact('listaTamanho'));
    }
    
    
    /**
     * Cria uma novo Tamanho
     * @param Request $request
     * @return type
     */
    public function store(Request $request){
        $dados = $request->all();
        $verif = $this->tamanho->create($dados);
        if ($verif) {
            return redirect()->route('tamanho.index');
        } else {
            return redirect()->route('tamanho.index')->with (['errors'=>'Erro ao cadastrar']);
        }
    }
    
    
     public function show($id) {
        $tamanho = $this->tamanho->find($id);
        $listaTamanho = $this->tamanho::paginate(3);
        return view('tamanhoEdit', compact('tamanho','listaTamanho'));
        
     }
     
     
     
     
      /**
     * Remove uma Espessura
     * @param type $id
     * @return type
     */
    
    public function delete($id){
        $tamanho = $this->tamanho->find($id);
        $verif = $tamanho->delete();
        
        if($verif){
            return redirect()->route('tamanho.index');
        }
        else{
            return redirect ()->route ('tamanho.index')->with (['errors'=>'Erro ao Deletar']);
        }
    }
    
}