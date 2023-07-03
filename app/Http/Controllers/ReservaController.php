<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Viaje;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function mostrarFormulario()
    {
        // Obtener el ID del usuario autenticado
        $idUsuario = Auth::id();

        // Obtener los viajes disponibles con estado "Activo"
        $viajes = Viaje::where('estado', 'Activo')->get();

        return view('formulario_reserva', ['id_usuario' => $idUsuario, 'viajes' => $viajes]);
    }
    

    public function guardarReserva(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_usuario' => 'required',
            'id_viaje' => 'required',
        ]);

        // Crear una nueva reserva
        $reserva = new Reserva();
        $reserva->id_usuario = $request->input('id_usuario');
        $reserva->id_viaje = $request->input('id_viaje');
        $codigo = Str::random(10); // Genera una cadena alfanumérica de longitud 10

        // Guardar el código en el campo 'codigo' de la reserva
        $reserva->codigoDeAcceso = $codigo;

        // Generar el código QR basado en la cadena alfanumérica
        $codigoQR = $this->generarCodigoQR($codigo);

        // Asignar el código QR a la reserva
        $reserva->codigo_qr = $codigoQR;
        $reserva->save();
        
        //dd($reserva->id_reserva);

        return redirect()->route('mostrar_reserva', ['idReserva' => $reserva->id_reserva]);
    }

    //
    public function mostrarReserva($idReserva)
    {
        // Obtener la reserva y el código QR correspondiente
        $reserva = Reserva::find($idReserva);
        $codigoQR = $reserva->codigo_qr;

        return view('mostrar_reserva', ['reserva' => $reserva, 'codigoQR' => $codigoQR]);
    }

    private function generarCodigoQR($codigo)
    {
        $data = $codigo;

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);

        return $writer->writeString($data);
    }
    
    public function escanearQR($codigoQR)
{
    // Aquí puedes implementar la lógica para verificar y procesar el código QR escaneado por el chofer

    // Por ejemplo, puedes buscar la reserva correspondiente al código QR escaneado
    $reserva = Reserva::where('codigo_qr', $codigoQR)->first();

    // Verificar si se encontró la reserva
    if ($reserva) {
        // Realizar las acciones necesarias para la reserva escaneada

        // Por ejemplo, puedes marcar la reserva como utilizada por el chofer
        $reserva->utilizada = true;
        $reserva->save();

        // Redirigir a una vista de confirmación o mostrar un mensaje de éxito
        return redirect()->route('confirmacion_reserva');
    } else {
        // Si el código QR no corresponde a ninguna reserva, redirigir a una vista de error o mostrar un mensaje de error
        return redirect()->route('error_reserva');
    }
}
}
