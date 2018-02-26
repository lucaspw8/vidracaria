<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modelos\Cliente;

class ClienteController extends Controller
{

    private $cliente;
 
    public function __construct(Cliente $cli) {
        $this->cliente = $cli;
    }

    public function index()
    {
        //$listaCli = $this->cliente->all();
        //return view('cursoLista', compact('listaCli'));
        dd("Teste");
        return view('clienteCadastro');
    }
    
    public function create() {
        
    }
    /**
     * Função que cadastra um novo Cliente
     * @param Request $r
     * @return type
     */
    public function store(Request $r){
        
       
        $dados = $r->all();
        $verif = $this->cliente->create($dados);
        if ($verif) {
            return dd($dados);//redirect()->route('teste');
        } else {
            return redirect()->route('teste');
        }
    }
    
     public function show($id) {
        $cli = $this->cliente->find($id);
        return view('clienteShow', compact('cli'));
        
       
     }
    
    
     public function update(Request $request, $id) {
      
        $dados = $request->all();
        $cli = $this->cliente->find($id);
        $verif = $cli->update($dados);
        if ($verif){
            return redirect()->route('curso.index');
        }
        else{
            return redirect()->route('curso.edit');
        }
    }
    
    /**
     * Remove um Cliente
     * @param type $id
     * @return type
     */
    
    public function destroy($id) {
        $cli = $this->cliente->find($id);
        $verif = $cli->delete();
        
        if($verif){
            return redirect()->route('curso.index', compact('menu'));
        }
        else{
            return redirect ()->route ('curso.show', compact('menu') ,$id)->with (['errors'=>'Erro ao Deletar']);
        }
    }
    /**
     * Pesquisa os clientes por nome
     * @param type $nome
     * @return type
     */
    public function pesquisar($nome){
         $cli = $this->cliente::where('nome','like',$nome."%")->get();
         return view('clienteteste', compact('cli'));
    }
    
}
