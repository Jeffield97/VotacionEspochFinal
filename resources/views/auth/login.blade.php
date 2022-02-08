<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Loging E-Votig_ESPOCH</title>
        <link rel="stylesheet" href="{{url('css/login.css')}}">
    </head>
    <body>
        <header class="bg_animate">
            <div class="header_nav">
                <div class="contenedor">
                    <h1>E-Voting_ESPOCH</h1>
                    <nav>
                        <a href = "#"></a>
                    </nav>
                </div>
            </div>
            <section class="banner contenedor">
                <secrion class="banner_title">
                    <h2><a href="{{ url('/') }}">Voto Electronico ESPOCH</a> </h2>

                </secrion>
                <div class="banner_img">
                    <img src="https://image.flaticon.com/icons/png/512/1601/1601092.png" alt="">
                </div>
            </section>
            <div class="burbujas">
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
            </div>

        <header>


    </body>
</html>


<x-guest-layout>
    <!--<head>SISTEMA DE VOTACION E-VOTING_ESPOCH</head>
    -->
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <x-jet-authentication-card >


        <x-slot name="logo">
            <!--<x-jet-authentication-card-logo /> -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Escudo_de_la_Escuela_Superior_Polit%C3%A9cnica_de_Chimborazo.png" alt="LogoEspoch" border="10px" height="250px" width="200px">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Institucional') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
        <!--
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
        -->

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __(' Ingresar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <footer>
        <h1>Este es el pie de pagina</h1>
    </footer>
</x-guest-layout>
