<@extends('templates.menu')

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
    <form class="form" method="post" action="{{route('ferragem.store')}}" >
       
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="utilizacao" placeholder="Utilização" value="{{old('utilizacao')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
             <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="descricao" placeholder="Descrição" value="{{old('telefone')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
           <form>
                <select name="Cor">
                  <option value="branco">Branco</option>
                  <option value="fosco">Fosco</option>
                  <option value="latao">Latão</option>
                </select>
            </form>
             
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