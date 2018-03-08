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
        $listaCli = Cliente::Paginate(3);
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
        //$endereco = $dados;
        $endereco = [
            'logradouro' => $dados['logradouro'],
            'bairro' => $dados['bairro'],
            'numero' => $dados['numero'],
            'cidade' => $dados['cidade']
        ];        
        $cli = $this->cliente->find($id);
        $verif = $cli->update($dados);
        //Atualiza o endereço quando o cliente ja possui um 
        if($cli->endereco != null){
            $cli->endereco()->update($endereco);                       
      }
        //Cria um novo endereço caso o cliente não possua
        else{
          if($dados['logradouro']!=NULL &&$dados['cidade']!=NULL && $dados['numero']!=NULL ){
           $cli->endereco()->create($endereco);               
        }
           
        }       
         if ($verif){
          return redirect()->route('cliente.show',$id);
        }else{
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
