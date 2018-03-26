@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class=""> EDITAR TAMANHO</h1>
        </div>
      </div>
    </div>
  </div>
@if(isset($errors) && count($errors)>0)
<div class="py-1">
   <div class="container">
    <div class="row">
     <div class="col-md-12">
            <div class="alert alert-danger">
                @foreach($errors->all() as $erro)
                <p>{{$erro}}</p>
                @endforeach
            </div>
        </div>
      </div>
    </div>
</div>
@endif
<div class="container">
    
    <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
         <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>Tamanho</th>
                <th>Remover</th>  
              </tr>
            </thead>
            <tbody>
            @foreach($listaTamanho as $tamanho)
             <tr onclick="location.href='{{route('tamanho.show',$tamanho->id)}}';">
                 <td>{{$tamanho->tamanho}}</td>
                 <td>
                   <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('tamanho.delete', $tamanho->id) }}" class="btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove" >Excluir</span> 
                   </a>
                 </td>                                                   
              </tr><!--Link em toda a linha da tabela que redireciona para o editar -->
            @endforeach
            </tbody>
          </table>
          {{$listaTamanho->links()}}
         </div>
        </div>
      
      
        <div class="col-md-6">
        <form class="form" method="post" action="{{route('tamanho.update',$tamanho->id)}}" >
       
       
           <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="tamanho" placeholder="Tamanho" value="{{$tamanho->tamanho or old('tamanho')}}"> 
            </div>
           </div>
                        
             <div class="col-md-12 ">
                 <div class="form-group">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <button class="btn d-inline-flex text-dark text-uppercase text-center btn-outline-success"> Salvar </button>
                 </div>
             </div>
         
        
        
    </form>  
    </div>
    </div>
    </div>   
 </div>
    
</div>
@endsection