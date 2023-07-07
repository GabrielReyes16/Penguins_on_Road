<<<<<<< HEAD
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Escaner') }}
        </h2>
    </x-slot>
=======
@extends ('usuario-chofer.navbar-abordaje')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-ticket.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Boletas de viaje' }}
@stop

@section ('contenido')
>>>>>>> 4b22e0ef6296c1e933cf1818856e33cb3ce71eee
    <div class="bg-white p-6">
        <div class="flex flex-row">
            <div class="w-full p-6">
                <div id="reader" class="w-full h-96"></div>
            </div>

            <audio id="myAudio1">
                <source src="{{ asset('audios/success.mp3') }}" type="audio/mpeg">
            </audio>
              
            <audio id="myAudio2">
                <source src="{{ asset('audios/failes.mp3') }}" type="audio/mpeg">
            </audio>

            <div class="w-full p-6">
                <h4 class="text-lg font-semibold">Resultado del escáner:</h4>
                <form id="reserva-form" method="POST" action="{{ route('utilizar-reserva') }}">
                    @csrf
                    <input type="text" name="codigoDeAcceso" class="input mt-2" id="result"  placeholder="Resultado" readonly>
                    <button type="submit">{{ __('Verificar') }}</button>
                </form>
                <p class="mt-4"  id="mensaje"></p>
                <div>
                    <button class="bg-green-700 rounded-full">{{ __('Comenzar viaje') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/escaneo-chofer.js') }}"></script>
    <script src="{{ asset('js/html5_qrcode.js') }}"></script>        
    <script src="{{ asset('js/escaner.js') }}"></script>
    </main>

@stop   
