
@extends('templates.menu')
@section('conteudo')
<br><br>
<div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <h1 class=" text-uppercase text-dark">Acessorios</h1>
        </div>
        <div class="col-md-4">
          <form class="form-inline" method="post" action="{{route('pesquisarAcessorio')}}">
            <div class="input-group ">
                <input type="search" class="form-control" width="80px" name="buscar">
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
          <a href="{{route('acessorio.create')}}" class="btn btn-outline-warning text-uppercase">Novo Acessorio</a>
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
                <th>Valor compra</th>
                <th>Valor venda</th>
                <th>Tamanho</th>
                <th>Espessura</th>
                <th>Excluir</th>
              </tr>
            </thead>
            <tbody>
             @foreach($listaAcessorio as $lista)
             <tr onclick="location.href='{{route('acessorio.show',$lista->id)}}';">
                <td>{{$lista->tipo}}</td>               
                <td>{{$lista->valorCompra}}</td>
                <td>{{$lista->valorVenda}}</td>
                <td>@if($lista->Tamanho){{$lista->Tamanho->tamanho}}@endif</td>
                <td>@if($lista->Espessura){{$lista->Espessura->espessura}} mm @endif</td>
                <td>
                   <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('acessorio.delete', $lista->id) }}" class="btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove" >Excluir</span> 
                   </a>
                </td>
         
               
                
                
            </tr><!--Link em toda a linha da tabela que redireciona para o editar -->
          @endforeach
            </tbody>
          </table>
          {{$listaAcessorio->links()}}
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection