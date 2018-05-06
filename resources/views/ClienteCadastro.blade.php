@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Cadastro de cliente</h1>
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
        <p class="lead col-md-12 bg-light "><b>DADOS PESSOAIS:</b></p>
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
                <span>*Nome:</span>   
              <input type="text" class="form-control d-inline-flex" name="nome" placeholder="Nome do cliente..." value="{{old('nome')}}"> 
            </div>
           </div>
             <div class="col-md-6"> 
            <div class="form-group">
                 <span>Telefone:</span>  
              <input type="text" class="form-control d-inline-flex" name="telefon..." data-mask="(00) 00000-0000" placeholder="Telefone" value="{{old('telefone')}}"> 
            </div>
           </div>
            <div class="col-md-6"> 
                <div class="form-group">
                     <span>CPF:</span>  
                    <input type="text" class="form-control" data-mask="000.000.000-00" name="cpf" placeholder="Cpf Ex.: 000.000.000-00" value="{{old('cpf')}}"> 
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                      <span>E-mail:</span>  
                    <input type="email" class="form-control" name="email" placeholder="E-mail..."> 
                 </div>
            </div>
              <p class="lead col-md-12 bg-light "><b>ENDEREÇO:</b></p>
             <div class="col-md-6">
                <div class="form-group">
                     <span>Logradouro:</span>  
                    <input type="text" class="form-control" name="logradouro" placeholder="Logradouro..."> 
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                     <span>Bairro:</span>  
                    <input type="text" class="form-control" name="bairro" placeholder="Bairro..."> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                     <span>Numero:</span>  
                    <input type="text" class="form-control" name="numero" placeholder="Número..."> 
                </div>
            </div>
             <div class="col-md-6">
               <div class="form-group">
                 <span>Cidade:</span>  
                <input type="text" class="form-control" name="cidade" placeholder="Cidade..."> 
                
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