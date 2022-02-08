@extends("layouts.main")
@section('content')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->
<a href="/candidates/create" class="btn btn-primary">CREAR</a>


<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Código</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cantidad</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($candidates as $candidate)
    <tr>
        <td>{{$candidate->id}}</td>
        <td>{{$candidate->name}}</td>
        <td>{{$candidate->lista}}</td>
        
        <td>
          <form action="{{route('candidates.destroy',$candidate->id)}}" method="POST">
          <a href="/candidates/{{$candidate->id}}/edit" class="btn btn-info">Editar</a>
          @csrf
          @method('DELETE') 
          <button class="btn btn-danger">Borrar</button>
          </form>
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

@endsection