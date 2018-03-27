
@extends('templates.menu')
@section('conteudo')
<br><br>
<div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
            <h1 class=" text-uppercase text-dark">Perfil Kit-Box</h1>
        </div>
        <div class="col-md-2">
          <form class="form-inline" method="post" action="{{route('pesquisarkitbox')}}">
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
          <a href="{{route('kitbox.create')}}" class="btn btn-outline-warning text-uppercase">Novo Perfil </a>
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
                <th>Metragem</th>               
                <th>Cor</th>
                <th>Folhas</th>
                <th>Remover</th>
              </tr>
            </thead>
            <tbody>
             @foreach($listakitbox as $kitbox)
             <tr onclick="location.href='{{route('kitbox.show',$kitbox->id)}}';">
                <td>{{$kitbox->metragem}}</td>               
                <td>{{$kitbox->cor}}</td>
                <td>{{$kitbox->folhas}}</td>
                <td>
                   <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('kitbox.delete', $kitbox->id) }}" class="btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove" >Excluir</span> 
                   </a>
                </td>
         
               
                
                
            </tr><!--Link em toda a linha da tabela que redireciona para o editar -->
          @endforeach
            </tbody>
          </table>
          @if($listakitbox->links() != null)
          {{$listakitbox->links()}}
          @endif
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection