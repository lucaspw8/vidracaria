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
    <form class="form" method="post" action="{{route('vidro.store')}}" >
       
         <div class="row">
               <div class="col-md-6">
                <div class="form-group">
                 <span>*COR:</span>  
                <select name="cor" class="form-control">
                  <option value="INCOLOR">INCOLOR</option>
                  <option value="VERDE">VERDE</option>
                  <option value="FUMÊ">FUMÊ</option>
                  <option value="ASTRAL">ASTRAL</option>
                  <option value="MINI BOREAL">MINI BOREAL</option>
                  <option value="CHAMPANHE">CHAMPANHE</option>
                  <option value="COVERGLASS">COVERGLASS</option>
                  <option value="VERMELHO">VERMELHO</option>
                </select>
               </div>
              </div>
             
             
              <div class="col-md-6">
                <div class="form-group">
                    <span>*ESPESSURA:</span>  
                <select name="espessura" class="form-control">                
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
                *VALOR COMPRA:
              <input type="text" class="form-control d-inline-flex" name="valorCompra" placeholder="Valor compra..." value="{{old('valorCompra')}}"> 
            </div>
           </div>
             
             <div class="col-md-6"> 
                <div class="form-group">   
                    *VALOR VENDA:
                     <input type="text" class="form-control" name="valorVenda" placeholder="Valor venda..." value="{{old('valorVenda')}}">                               
                </div>
            </div>
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