@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Dados Perfil Kit-Box {{$kitbox->nome}}</h1>
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
    <form class="form" method="post" action="{{route('kitbox.update', $kitbox->id)}}" >
        <p class="lead col-md-12 bg-light "><b>DADOS PERFIL</b></p>
         <div class="row">
           <div class="col-md-4"> 
            <div class="form-group">
              <span>*Metragem:</span> 
              <input type="text" class="form-control d-inline-flex" name="metragem" placeholder="Metragem" value="{{$kitbox->metragem or old('metragem')}}"> 
            </div>
           </div>
             <div class="col-md-4">
                <div class="form-group">
                    <span>*Cor:</span> 
                <select name="cor" class="form-control">
                  <option value="BRANCO"@if($kitbox->cor == "BRANCO") selected @endif> BRANCO</option>
                  <option value="FOSCO" @if($kitbox->cor == "FOSCO") selected @endif> FOSCO</option>
                  <option value="PRETO" @if($kitbox->cor == "PRETO") selected @endif> PRETO</option>
                  <option value="PRATA" @if($kitbox->cor == "PRATA") selected @endif> PRATA</option>
                </select>
                </div>
             </div>
              
            <div class="col-md-4">
                <div class="form-group">
                 <span>*Folhas:</span> 
                <select name="folhas" class="form-control">
                  <option value="2 FOLHAS" @if($kitbox->folhas == "2 FOLHAS") selected @endif> 2 FOLHAS</option>
                  <option value="4 FOLHAS" @if($kitbox->folhas == "4 FOLHAS") selected @endif >4 FOLHAS</option>
                  </option>
                </select>
                </div>
            </div>
            
             <div class="col-md-12 ">
                 <div class="form-group">
             {{method_field('PUT')}}      
             {{csrf_field()}}
            <button class="btn d-inline-flex text-dark text-uppercase text-center btn-outline-success">Salvar</button>
                 </div>
             </div>
         </div>
        
        
    </form>  
</div>
@endsection