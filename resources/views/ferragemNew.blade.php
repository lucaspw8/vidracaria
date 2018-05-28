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
    <form class="form" method="post" action="{{route('ferragem.store')}}" >
       
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
                <span>*Utilização:</span>   
              <input type="text" class="form-control d-inline-flex" name="utilizacao"  value="{{old('utilizacao')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
             <div class="col-md-6"> 
            <div class="form-group">
                <span>Descrição:</span>   
              <input type="text" class="form-control d-inline-flex" name="descricao" value="{{old('telefone')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
               <div class="col-md-6">
                <div class="form-group">
                 <span>*Cor:</span>   
                <select name="cor" class="form-control">  
                  <option value="BRANCO">BRANCO</option>
                  <option value="FOSCO">FOSCO</option>
                  <option value="LATÃO">LATÃO</option>
                </select>
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