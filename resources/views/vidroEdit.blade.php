@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Cadastro de Vidro</h1>
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
    <form class="form" method="post" action="{{route('vidro.update',$vidro->id)}}" >
       
         <div class="row">
          
             <div class="col-md-6">
                <div class="form-group">
                <select name="cor"class="form-control">
                  <option value="INCOLOR" @if($vidro->cor == "INCOLOR") selected @endif>INCOLOR</option>
                  <option value="VERDE" @if($vidro->cor == "FOSCO") selected @endif >VERDE</option>
                  <option value="FUMÊ" @if($vidro->cor == "FUMÊ") selected @endif >FUMÊ</option>
                  <option value="ASTRAL" @if($vidro->cor == "ASTRAL") selected @endif>ASTRAL</option>
                  <option value="MINI BOREAL" @if($vidro->cor == "MINI BOREAL") selected @endif >MINI BOREAL</option>
                  <option value="CHAMPANHE" @if($vidro->cor == "CHAMPANHE") selected @endif >CHAMPANHE</option>
                  <option value="COVERGLASS" @if($vidro->cor == "COVERGLASS") selected @endif >COVERGLASS</option>
                  <option value="VERMELHO" @if($vidro->cor == "VERMELHO") selected @endif >VERMELHO</option>
                </select>
              </div>
             </div>
               <div class="col-md-6">
               <div class="form-group">
                <select name="espessura"class="form-control">
                  @if($listaEspessura)
                            @foreach($listaEspessura as $espessura)
                            <option value="{{$espessura->id}}" @if($espessura->id == $vidro->espessura_id) selected @endif> {{$espessura->espessura}}mm</option>
                            @endforeach
                   @endif
      
                </select>
              </div>   
                
             </div>
             
            <div class="col-md-6"> 
                <div class="form-group">
                *VALOR COMPRA:
                <input type="text" class="form-control d-inline-flex" name="valorCompra" placeholder="Valor compra..." value="{{$vidro->valorCompra or old('valorCompra')}}"> 
                </div>
           </div>
             
            <div class="col-md-6"> 
                <div class="form-group">   
                    *VALOR VENDA:
                     <input type="text" class="form-control" name="valorVenda" placeholder="Valor venda..." value="{{$vidro->valorVenda or old('valorVenda')}}">                               
                </div>
            </div>
             
             <div class="col-md-12 ">
                 <div class="form-group">
             {{method_field('PUT')}}
             {{csrf_field()}}
            <button class="btn d-inline-flex text-dark text-uppercase text-center btn-outline-success">Salvar </button>
                 </div>
             </div>
         </div>
        
        
    </form>  
</div>
@endsection