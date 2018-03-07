<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modelos\Cliente;
use App\Http\Requests\clienteRequest;

class ClienteController extends Controller
{

    private $cliente;
 
    public function __construct(Cliente $cli) {
        $this->cliente = $cli;
    }

    public function index()
    {
        $listaCli = $this->cliente->all();
        return view('clientelist', compact('listaCli'));
        
    }
    
    public function create() {
          return view('clienteCadastro');
    }
    /**
     * Função que cadastra um novo Cliente
     * @param Request $r
     * @return type
     */
    public function store(clienteRequest $r){
        
       
        $dados = $r->all();
        if($dados['logradouro']!=NULL &&$dados['cidade']!=NULL && $dados['numero']!=NULL ){
          $verif = $this->cliente->create($dados)->endereco()->create($dados);
        }else{
            $verif = $this->cliente->create($dados);
        }
        
        if ($verif) {
            return redirect()->route('cliente.index');
        } else {
            return redirect()->route('cliente.index');
        }
    }
    
     public function show($id) {
        $cli = $this->cliente->find($id);
        return view('clienteedit', compact('cli'));
        
       
     }
    /**
     * 
     * @param clienteRequest $request
     * @param type $id
     * @return type
     */
    
     public function update(clienteRequest $request, $id) {
      
        $dados = $request->all();
        $cli = $this->cliente->find($id);
        if($dados['logradouro']!=$cli->endereco->logradouro || $dados['cidade']!=$cli->endereco->cidade || $dados['numero']!=$cli->endereco->numero ){
          $verif = $this->cliente->save($dados);
          $this->cliente->endereco()->update($dados);
        }else{
            $verif = $this->cliente->update($dados);
        }
        if ($verif){
            return redirect()->route('cliente.show',$id);
        }
        else{
            return redirect()->route('cliente.show',$id);;
        }
    }
    
    /**
     * Remove um Cliente
     * @param type $id
     * @return type
     */
    
    public function delete($id) {
        $cli = $this->cliente->find($id);
        $verif = $cli->delete();
        
        if($verif){
            return redirect()->route('cliente.index');
        }
        else{
            return redirect ()->route ('cliente.show',$id)->with (['errors'=>'Erro ao Deletar']);
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
