@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Cadastro de Acessorio</h1>
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
    <form class="form" method="post" action="{{route('acessorio.store')}}" >
        <p class="lead col-md-12 bg-light "><b>DADOS:</b></p>
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
               <span>*Tipo:</span>    
              <input type="text" class="form-control d-inline-flex" name="tipo"  value="{{old('tipo')}}"> 
            </div>
           </div>
             <div class="col-md-3"> 
            <div class="form-group">
                <span>*Valor compra:</span>   
              <input type="text" class="form-control d-inline-flex" name="valorCompra" value="{{old('valorCompra')}}"> 
            </div>
           </div>
            <div class="col-md-3"> 
                <div class="form-group">                                  
                    <span>*Valor venda:</span>   
                    <input type="text" class="form-control" name="valorVenda" value="{{old('valorVenda')}}">                               
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                     <span>Espessura:</span>   
                    <select name="espessura" class="form-control">
                        <option value="0">espessura...</option>
                        @if($listaEspessura)
                            @foreach($listaEspessura as $espessura)
                            <option value="{{$espessura->id}}">{{$espessura->espessura}}mm</option>
                            @endforeach
                        @endif
                    </select>
                 </div>
            </div>
              
             <div class="col-md-6">
                <div class="form-group">
                   <span>Tamanho:</span>   
                  <select name="tamanho" class="form-control">
                        <option value="0">tamanho...</option>
                         @if($listaTamanho)
                            @foreach($listaTamanho as $tamanho)
                            <option value="{{$tamanho->id}}" >{{$tamanho->tamanho}}</option>
                            @endforeach
                        @endif

                    </select>
                </div>
            </div>
            <!--Botão cadastrar-->
             <div class="col-md-12 ">
                 <div class="form-group">
             {{csrf_field()}}
            <button class="btn d-inline-flex text-dark text-uppercase text-center btn-outline-success">Cadastrar</button>
                 </div>
             </div>
         </div>
        
        
    </form>  
</div>
@endsection