@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Cadastro de Ferragem</h1>
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
    <form class="form" method="post" action="{{route('ferragem.update',$ferragem->id)}}" >
       
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="utilizacao" placeholder="Utilização" value="{{ $ferragem->utilizacao or old('utilizacao')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
             <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="descricao" placeholder="Descrição" value="{{ $ferragem->descricao or old('descricao')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
             <div class="col-md-6">
                <div class="form-group">
                <select name="cor"class="form-control">
                  <option value="BRANCO" @if($ferragem->cor == "BRANCO") selected @endif>  BRANCO</option>
                  <option value="FOSCO" @if($ferragem->cor == "FOSCO") selected @endif >FOSCO</option>
                  <option value="LATÃO" @if($ferragem->cor == "LATÃO") selected @endif >LATÃO</option>
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