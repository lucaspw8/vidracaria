<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="{{url('assets/site/css/estilo.css')}}">
        
    </head>

    <body>
      <nav role="navigation" class="navbar navbar-default">       
             
          
        </nav>
        <div class="container">
            <form method="post" action="{{route('cliente.update',2)}}">
                Nome: <input type="text" name="nome">
                CPF: <input type="text" name="cpf">
                {{method_field('PUT')}}                
                {{csrf_field()}}
                <input type="submit">
            </form>
            
            <h1>{{dd($cli)}}</h1>
                
        </div>
       
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/site/js/bootstrap.min.js"></script>
    </body>

</html>