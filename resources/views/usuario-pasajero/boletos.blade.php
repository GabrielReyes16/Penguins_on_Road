@extends ('plantilla')

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-ticket.css') }}">
@stop

@section ('titulo')
    {{ 'Menu || Boletas de viaje' }}
@stop

@section ('contenido')
<!--contenido tabla de boletas-->
    <main>
        <div class="contenido-ticket">
            <h3>Mis boletas de viaje</h3>
            <div class="contenido-tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Turno</th>
                            <th>Ruta</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lunes 16/04</td>
                            <td>Mañana</td>
                            <td>Av. Aviación - Campus</td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><ion-icon name="eye"></ion-icon></a>
                            </td>
                        </tr>
                    </tbody>
                </table>  
            </div>
 
        </div>
    </main>

@stop   