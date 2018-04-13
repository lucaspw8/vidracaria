
@extends('templates.menu')
@section('conteudo')

<br><br>
 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-uppercase text-dark">Materiais</h1>
        </div>
      </div>
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('acessorio.index')}}"> Acessórios </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ferragem.index')}}"> Ferragens </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('espessura.index')}}"> Espessuras </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> Vidros </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('kitbox.index')}}"> Perfil Kit- box </a>
          </li>
        </ul>
    </div>
  </div>
@endsection