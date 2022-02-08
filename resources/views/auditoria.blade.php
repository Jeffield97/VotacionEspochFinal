
<h1 style text>Auditoría de elecciones</h1>
<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Id Candidato</th>
      <th scope="col">Candidato</th>
      <th scope="col">Votos</th>
      <th scope="col">Lista</th>
      <th scope="col">Fecha </th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($auditoria as $auditoria)
    <tr>
        <td>{{$auditoria->id_auditoria}}</td>
        <td>{{$auditoria->id_candidato}}</td>
        <td>{{$auditoria->name_copia}}</td>
        <td>{{$auditoria->votes_copia}}</td>
        <td>{{$auditoria->lista_copia}}</td>
        <td>{{$auditoria->fecha}}</td>
        
    </tr>
    @endforeach
  </tbody>
</table>
