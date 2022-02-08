@extends("layouts.main")
@section("content")

@include("flash")

<div class="container">

<h3 class="text-center mt-3">Últimos resultados</h3>
@foreach($candidates as $candidate)
<div class="card mb-3 mt-3">
<div class=card-body>
Candidato: {{$candidate->name}}
<br>
Lista: {{$candidate->lista}}
<div class="progress">
<div class="progress-bar"role="progressbar" style="width: {{($candidate->votes/1000)*100}}%;"aria-valuenow="25" aria-valuemin="0"aria-valuemax="1000">{{$candidate->votes}}</div>
</div>
</div>
</div>
@endforeach
</div>

@endsection