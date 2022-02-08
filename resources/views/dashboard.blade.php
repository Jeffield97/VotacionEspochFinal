<link rel="stylesheet" type="text/css" href="{{url('css/home.css')}}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1">
            <h2>E-Voting_ESPOCH</h2>
            <h3>Voto Electronico ESPOCH</h3>
            <p>El voto electrónico suele ser visto como una herramienta para lograr 
                que el proceso electoral sea más eficiente y para generar una mayor 
                confianza.</p>
            <a href="https://www.espoch.edu.ec/index.php/component/k2/item/5227-convocatoria-elecciones.html">
                Conocer Mas...
            </a>

        </div>
        <div class="col-2">
            <img src="https://www.weact.org/wp-content/uploads/2021/03/Vote-Ballot.jpg" class="contaller">
            <div class="color-box"></div>

        </div>
        
        
    </div>
</x-app-layout>
