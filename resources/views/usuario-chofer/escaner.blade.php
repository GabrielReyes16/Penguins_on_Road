@extends ('usuario-chofer.navbar-abordaje')

@section ('titulo')
    {{ 'Menu || Scaner' }}
@stop

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
@stop

@section ('contenido')
    <!--contenido carrusel-->
    <main>
        <div class="contenido-scan bg-white p-6" style="margin-top: 35px;">
            <div class="flex flex-col ">
                <div class="w-full p-6">
                    <div id="reader" class="w-full  h-1/2"></div>
                </div>

                <audio id="myAudio1">
                    <source src="{{ asset('audios/success.mp3') }}" type="audio/mpeg">
                </audio>
                
                <audio id="myAudio2">
                    <source src="{{ asset('audios/failes.mp3') }}" type="audio/mpeg">
                </audio>

                <div class="w-full p-10 h-1/2">
                    <h4 class="text-lg font-semibold">Resultado del escáner:</h4>
                    <form id="reserva-form" method="POST" action="{{ route('utilizar-reserva') }}">
                        @csrf
                        <input type="text" name="codigoDeAcceso" class="input mt-2" id="result"  placeholder="Resultado" readonly>
                        <button type="submit">{{ __('Verificar') }}</button>
                    </form>
                    <p class="mt-4"  id="mensaje"></p>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/escaneo-chofer.js') }}"></script>
        <script src="{{ asset('js/html5_qrcode.js') }}"></script>        
        <script src="{{ asset('js/escaner.js') }}"></script>
    </main>

@stop   
