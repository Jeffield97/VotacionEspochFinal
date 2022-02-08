
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel=stylesheet href="{{asset('css/mycss.css')}}"/>
    <title>ESPOCH</title>
</head>
<body>

<div class="dropdown" >

  <nav class="navbar navbar-dark bg-dark">
    <br>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <img class="logo2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Escudo_de_la_Escuela_Superior_Polit%C3%A9cnica_de_Chimborazo.png/640px-Escudo_de_la_Escuela_Superior_Polit%C3%A9cnica_de_Chimborazo.png" >
    <a class="navbar-brand" href="https://www.espoch.edu.ec/">ESPOCH</a>
    
    <div class="dropdown-menu"  id="navbarNavAltMarkup">
      <a class="dropdown-item" aria-current="page" href="/voting">Votar</a>
      <a  class="dropdown-item" href="/">Perfil</a> 
      @if(Auth::check() && Auth::user()->is_admin)
      <a class="dropdown-item" href="/uploadCsv">Subir Padrón</a>
      <a class="dropdown-item" href="/auditoria">Auditoria</a>
      <a class="dropdown-item" href="/candidates">Administrar</a>
      @endif

        <!-- <a class="nav-link" href="#">Pricing</a> -->
        <!-- <a class="nav-link disabled">Disabled</a> -->
</ul>
</div>

</nav>
</div>

