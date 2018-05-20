@extends('templates.menu')
@section('conteudo')
<br><br>
<div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <h1 class=" text-uppercase text-dark">Ferragem </h1>
        </div>
        <div class="col-md-4">
          <form class="form-inline" method="post" action="{{route('pesquisarFerra')}}">
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
          <a href="{{route('ferragem.create')}}" class="btn btn-outline-warning text-uppercase">Novo </a>
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
                <th>Utilização</th>               
                <th>Cor</th>
                <th>Descrição</th>
                <th>Remover</th>
              </tr>
            </thead>
            <tbody>
             @foreach($listaFerra as $ferra)
             <tr onclick="location.href='{{route('ferragem.show',$ferra->id)}}';">
                <td>{{$ferra->utilizacao}}</td>               
                <td>{{$ferra->cor}}</td>
                <td>{{$ferra->descricao}}</td>
                <td>
                   <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('ferragem.delete', $ferra->id) }}" class="btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove" >Excluir</span> 
                   </a>
                </td>
         
               
                
                
            </tr><!--Link em toda a linha da tabela que redireciona para o editar -->
          @endforeach
            </tbody>
          </table>
          {{$listaFerra->links()}}
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection