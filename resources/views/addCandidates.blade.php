@extends("layouts.main")

@section('content')

<div class="container">
<form action="{{route('createCandidate')}}" method="POST" >
    {{csrf_field()}}
    <div class="form-group">
    <label >Nombre del candidato</label>
    <input type="text" name="candidateName" class="form-control" placeholder="Ingresa el nombre del candidato"/>
    <br>
    <label >Lista del candidato</label>
    <input type="text" name="candidateList" class="form-control" placeholder="Ingresa el nombre de la lista"/>
    <br>
    </div>

<button type="submit" class="btn btn-primary">Enviar</button>

</form>
</div>

@endsection
