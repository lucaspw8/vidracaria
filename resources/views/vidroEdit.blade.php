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
                  <option value="VERDE" @if($vidro->cor == "FOSCO") selected @endif >FOSCO</option>
                  <option value="FUMÊ" @if($vidro->cor == "FUMÊ") selected @endif >FUMÊ</option>
                  <option value="ASTRAL" @if($vidro->cor == "BRANCO") selected @endif>  BRANCO</option>
                  <option value="MINI BOREAL" @if($vidro->cor == "FOSCO") selected @endif >FOSCO</option>
                  <option value="CHAMPANHE" @if($vidro->cor == "LATÃO") selected @endif >CHAMPANHE</option>
                  <option value="CHAMPANHE" @if($vidro->cor == "COVERGLASS") selected @endif >COVERGLASS</option>
                  <option value="COVERGLASS" @if($vidro->cor == "VERMELHO") selected @endif >VERMELHO</option>
                </select>
              </div>
                 
               <div class="form-group">
                <select name="Espessura"class="form-control">
                   <option value="INCOLOR" @if($vidro->cor == "INCOLOR") selected @endif>INCOLOR</option> 
      
                </select>
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