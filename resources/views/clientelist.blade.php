
@extends('templates.menu')
@section('conteudo')
<br><br>
<div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <p class="lead text-uppercase text-dark">Clientes</p>
        </div>
        <div class="col-md-2">
          <form class="form-inline">
            <div class="input-group">
              <input type="search" class="form-control" placeholder="pesquisa">
              <div class="input-group-append"> </div>
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
                <th>Cpf</th>
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
                <td>{{$cli->cpf}}</td>
                <td>{{$cli->email}}</td>
                <td>{{$cli->telefone}}</td>
                <td>@if($cli->endereco){{$cli->endereco->logradouro}}@endif</td>
                <td>
                   <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('cliente.delete', $cli->id) }}" class="btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove" ></span> Excluir
                   </a>
                </td>
         
               
                
                
            </tr>
          @endforeach
            </tbody>
          </table>
          {{$listaCli->links()}}
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection