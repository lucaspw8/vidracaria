@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Espessuras</h1>
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
                <th>Espessura</th>
                <th>Remover</th>  
              </tr>
            </thead>
            <tbody>
            @foreach($listaEspessura as $espessura)
             <tr onclick="location.href='{{route('espessura.show',$espessura->id)}}';">
                 <td>{{$espessura->espessura}}</td>
                 <td>
                   <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('espessura.delete', $espessura->id) }}" class="btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove" >Excluir</span> 
                   </a>
                 </td>                                                   
              </tr><!--Link em toda a linha da tabela que redireciona para o editar -->
            @endforeach
            </tbody>
          </table>
          {{$listaEspessura->links()}}
         </div>
        </div>
      
      
        <div class="col-md-6">
        <form class="form" method="post" action="{{route('espessura.store')}}" >
       
       
           <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="espessura" placeholder="Espessura" value="{{old('espessura')}}"> 
            </div>
           </div>
                        
             <div class="col-md-12 ">
                 <div class="form-group">
            {{csrf_field()}}
            <button class="btn d-inline-flex text-dark text-uppercase text-center btn-outline-success">Cadastrar</button>
                 </div>
             </div>
         
        
        
    </form>  
    </div>
    </div>
    </div>   
 </div>
    
</div>
@endsection