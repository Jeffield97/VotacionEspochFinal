@extends ('layouts.main')

@section('content')
<br>
<div class="panel panel-default" >
    <form class="form-horizontal"  action="{{route('castYourVote')}}" method='post'>
        {{csrf_field()}}
        <fieldset class="form-check" >
            <div class="modal-content">
                <div class="col-sm-10" style="margin: 0 auto">
                    <h3>Candidatos</h3>
                    
                    @foreach($candidates as $candidate)
                    <div class="card">
                    <input class="form-check-input" type="radio" name="candidateId" id="flexRadioDefault1" value="{{$candidate->id}}">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <h5>Candidato: {{$candidate->name}} </h5> 
                        <h5>Lista: {{$candidate->lista}} </h5>
                    </label>
                   </div>
                    <br>
                    @endforeach

                    <div class="form-group row">
                        <div class="col-sm-10" style="margin:0 auto">
                            <button type="submit" class="btn btn-primary">Votar</button>
                        </div>
                    </div>

                </div>
            </div>
        </fieldset>
    </form>
</div>

@endsection