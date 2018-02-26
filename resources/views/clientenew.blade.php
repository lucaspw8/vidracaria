@extends('templates.menu')

@section('conteudo')
<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h1 class="">Cadastro de clientes&nbsp;</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <p class="lead col-md-12 bg-light "><b>DADOS PESSOAIS:</b></p>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <input type="text" class="form-control d-inline-flex" placeholder="Nome"> <small class="form-text text-muted"></small> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Cpf"> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="E-mail"> </div>
        </div>
      </div>
      <p class="lead col-md-12 bg-light border-warning"><b>ENDEREÇO:</b></p>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Logradouro"> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Bairro"> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Número"> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Cidade"> </div>
        </div>
      </div>
      <div class="py-2">
        <div class="container align-items-center align-self-center justify-content-center flex-row col-md-3">
          <div class="row">
            <div class="col-sm-3 col-md-7">
              <a href="#" class="btn d-inline-flex text-dark text-uppercase text-center btn-outline-success">Cadastrar</a>
            </div>
            <div class="col-sm-3">
              <a href="#" class="btn btn-outline-danger text-dark text-uppercase">Cancelar</a>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
  </div>
 
@endsection