
@extends('templates.menu')
@section('conteudo')
<br><br>
<div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
            <h1 class=" text-uppercase text-dark">Clientes</h1>
        </div>
        <div class="col-md-2">
          <form class="form-inline" method="post" action="{{route('pesquisarCli')}}">
            <div class="input-group">
                <input type="search" class="form-control" name="buscar">
             {{csrf_field()}}
            <button class="btn btn-default btn-sm">
                <span class="">Buscar... </span>
            </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('cliente.create')}}" class="btn btn-outline-warning text-uppercase">Novo cliente</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>Nome</th>               
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Remover</th>
              </tr>
            </thead>
            <tbody>
             @foreach($listaCli as $cli)
             <tr onclick="location.href='{{route('cliente.show',$cli->id)}}';">
                <td>{{$cli->nome}}</td>               
                <td>{{$cli->email}}</td>
                <td>{{$cli->telefone}}</td>
                <td>@if($cli->endereco){{$cli->endereco->logradouro}}@endif</td>
                <td>
                   <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('cliente.delete', $cli->id) }}" class="btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove" >Excluir</span> 
                   </a>
                </td>
         
               
                
                
            </tr><!--Link em toda a linha da tabela que redireciona para o editar -->
          @endforeach
            </tbody>
          </table>
          @if($listaCli->links() != null)
          {{$listaCli->links()}}
          @endif
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection