@extends('templates.menu')

@section('conteudo')
<br><br>

<div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <p class="lead text-uppercase text-dark">Clientes</p>
        </div>
        <div class="col-md-2">
          <form class="form-inline">
            <div class="input-group">
              <input type="search" class="form-control" placeholder="pesquisa">
              <div class="input-group-append"> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="newpage.html" class="btn btn-outline-warning text-uppercase">Novo cliente</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Cpf</th>
                <th>E-mail</th>
                <th>Endereço</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Felipe Almeida</td>
                <td>078.897.987-11</td>
                <td>vainessa@gmail.com</td>
                <td>Rua avara keraba</td>
              </tr>
              <tr>
                <td>Lucas Moura</td>
                <td>345.098.897-42</td>
                <td>seinao@gmail.com</td>
                <td>Rua bartolomeu </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection