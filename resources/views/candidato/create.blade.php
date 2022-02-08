@extends("layouts.main")

@section('content')



<div class="container">
  <div class="abs-center">
  <form action="/candidates" method="POST" >
    {{csrf_field()}}
    <div class="form-group">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg" >Nombre del candidato</label>
    <input type="text" name="candidateName" class="form-control" placeholder="Ingresa el nombre del candidato"/>
    <br>
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg" >Lista del candidato</label>
    <input type="text" name="candidateList" class="form-control" placeholder="Ingresa el nombre de la lista"/>
    <br>
    </div>

<button type="submit" class="enviar">Enviar</button>
<br>
<br>

</form>
  </div>
</div>

@endsection
