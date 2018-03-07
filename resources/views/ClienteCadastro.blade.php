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
<div class="container">
    <form class="form" method="post" action="{{route('cliente.store')}}" >
        <p class="lead col-md-12 bg-light "><b>DADOS PESSOAIS:</b></p>
         <div class="row">
           <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="nome" placeholder="Nome" value="{{old('nome')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
             <div class="col-md-6"> 
            <div class="form-group">
              <input type="text" class="form-control d-inline-flex" name="telefone" placeholder="Telefone" value="{{old('telefone')}}"> <small class="form-text text-muted"></small> 
            </div>
           </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <input type="text" class="form-control" name="cpf" placeholder="Cpf" value="{{old('cpf')}}"> 
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail"> 
                 </div>
            </div>
             <p class="lead col-md-12 bg-light border-warning"><b>ENDEREÇO:</b></p>
              <p class="lead col-md-12 bg-light "><b>ENDEREÇO:</b></p>
             <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="logradouro" placeholder="Logradouro"> 
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="bairro" placeholder="Bairro"> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="numero" placeholder="Número"> 
                </div>
            </div>
             <div class="col-md-6">
               <div class="form-group">
                <input type="text" class="form-control" name="cidade" placeholder="Cidade"> 
                
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