@extends ('usuario-chofer.navbar-home')

@section ('titulo')
    {{ 'Menu || Inicio' }}
@stop

@section ('contenido')
    <!--contenido carrusel-->
    <main>
        <div class="carrusel">
            
            <div class="slide">
                <div class="historial">
                    <h3>HISTORIAL DE BOLES</h3>
                </div>
            </div>

            <div class="slide">
                <div class="novedades">
                    <h3>NOVEDADES</h3>
                </div>
            </div>

        </div>

        <div class="seleccion">
            <div class="box">
                <span class="boton"><ion-icon class="atras" name="chevron-back"></ion-icon></span>
                <div class="line"></div>
                <span class="boton"><ion-icon class="siguiente" name="chevron-forward"></ion-icon></span>
            </div>
        </div>

    </main>
@stop