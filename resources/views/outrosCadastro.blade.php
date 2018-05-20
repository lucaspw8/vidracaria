@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Cadastro de outros</h1>
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
    <form class="form" method="post" action="{{route('outros.store')}}" >
        <p class="lead col-md-12 bg-light "><b>DADOS:</b></p>
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="nome" placeholder="Nome" value="{{old('nome')}}"> 
            </div>
           </div>
             <div class="col-md-3"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="valorCompra" placeholder="Valor compra" value="{{old('valorCompra')}}"> 
            </div>
           </div>
            <div class="col-md-3"> 
                <div class="form-group">                                  
                     <input type="text" class="form-control" name="valorVenda" placeholder="Valor venda" value="{{old('valorVenda')}}">                               
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <select name="espessura" class="form-control">
                        <option value="0">Espessura</option>
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
                  <select name="tamanho" class="form-control">
                        <option value="0">Tamanho</option>
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