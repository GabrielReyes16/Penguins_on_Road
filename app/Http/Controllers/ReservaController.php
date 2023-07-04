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
    

    public function utilizarReserva(Request $request)
{
    $codigoDeAcceso = $request->input('codigoDeAcceso');

    // Buscar la reserva correspondiente al código de acceso
    $reserva = Reserva::where('codigoDeAcceso', $codigoDeAcceso)->first();

    if ($reserva) {
        if ($reserva->utilizada) {
            // La reserva ya ha sido utilizada, devuelve un mensaje indicando esto
            return response()->json(['message' => 'Esta reserva ya ha sido utilizada.'], 200);
        } else {
            // Actualizar el atributo "utilizada" a true
            $reserva->utilizada = true;
            $reserva->save();

            // Devuelve un mensaje de éxito
            return response()->json(['message' => 'Reserva utilizada exitosamente.'], 200);
        }
    } else {
        // El código de acceso no corresponde a ninguna reserva
        return response()->json(['message' => 'Código de acceso inválido.'], 404);
    }
}

    
}
