@if(session('message'))
<div class="container mt-3 text-center alert alert-success">
    {{session('message')}}
</div>
@endif

@if(session('messageProblem'))
<div class="container mt-3 text-center alert alert-danger">
    {{session('messageProblem')}}
</div>
@endif