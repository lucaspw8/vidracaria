@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Cadastro Perfil Kit-Box </h1>
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
    <form class="form" method="post" action="{{route('cliente.store')}}" >
        <p class="lead col-md-12 bg-light "><b>Cadastrar Perfil </b></p>
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="metragem" placeholder="Metragem" value="{{old('metragem')}}"> 
            </div>
           </div>
             <form>
                <select name="Cor">
                  <option value="branco">@if($perfil->cor == branco) selected @endif Branco</option>
                  <option value="fosco">@if($perfil->cor == fosco) selected @endif Fosco</option>
                  <option value="preto">@if($perfil->cor == preto) selected @endif Preto</option>
                  <option value="prata">@if($perfil->cor == prata) selected @endif Prata</option>
                </select>
            </form>
            <form>
                <select name="Folhas">
                  <option value="2folhas">@if($perfil->Folhas == 2folhas) selected @endif 2 </option>
                  <option value="4folhas">@if($perffil->Folhas == 4folhas) selected @endif 4 </option>
                  </option>
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