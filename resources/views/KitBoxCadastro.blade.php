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
    <form class="form" method="post" action="{{route('kitbox.store')}}" >
        <p class="lead col-md-12 bg-light "><b>Cadastrar Perfil </b></p>
         <div class="row">
           <div class="col-md-4"> 
            <div class="form-group">
                <span>*METRAGEM:</span>   
              <input type="text" class="form-control d-inline-flex" name="metragem" placeholder="Metragem" value="{{old('metragem')}}"> 
            </div>
           </div>
              <div class="col-md-4">
                <div class="form-group">
                <select name="cor" class="form-control">
                  <option>COR </option>
                  <option value="BRANCO">BRANCO</option>
                  <option value="FOSCO">FOSCO</option>
                  <option value="PRETO">PRETO</option>
                  <option value="PRATA">PRATA</option>
                </select>
                </div>
              </div>
             <div class="col-md-4">
                <div class="form-group">
                <select name="folhas" class="form-control">
                   <option>FOLHAS</option>
                  <option value="2 FOLHAS"> 2 FOLHAS </option>
                  <option value="4 FOLHAS"> 4 FOLHAS </option>
                  </option>
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