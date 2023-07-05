<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
use App\Models\BoletaViaje;

class ReservaController extends Controller
{
    public function mostrarFormulario()
{
    // Obtener el ID del usuario autenticado
    $idUsuario = Auth::id();

    // Obtener la fecha actual
    $currentDate = Carbon::now()->toDateString();

    // Verificar si existe una reserva previa para el usuario en la fecha actual
    $reservaExistente = Reserva::where('id_usuario', $idUsuario)
        ->where('fecha_reserva', $currentDate)
        ->first();

    if ($reservaExistente) {
        // Redirigir al código QR generado para la reserva existente
        return redirect()->route('mostrar_reserva', ['idReserva' => $reservaExistente->id_reserva]);
    } else {
        // Obtener los viajes disponibles con estado "Activo"
        $viajes = Viaje::where('estado', 'Activo')->get();

        return view('formulario_reserva', ['id_usuario' => $idUsuario, 'viajes' => $viajes]);
    }
}

public function editarReserva($idReserva)
{
    // Obtener la reserva existente
    $reserva = Reserva::findOrFail($idReserva);

    // Obtener los viajes disponibles con estado "Activo"
    $viajes = Viaje::where('estado', 'Activo')->get();

    return view('editar_reserva', ['reserva' => $reserva, 'viajes' => $viajes]);
}

public function actualizarReserva(Request $request, $idReserva)
{
    // Validar los datos del formulario
    $request->validate([
        'id_viaje' => 'required',
    ]);

    // Obtener la reserva existente
    $reserva = Reserva::findOrFail($idReserva);

    // Actualizar la reserva con los nuevos datos
    $reserva->id_viaje = $request->input('id_viaje');
    $reserva->save();

    return redirect()->route('mostrar_reserva', ['idReserva' => $reserva->id_reserva]);
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
        $reserva->fecha_reserva = Carbon::now()->toDateString();
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

            // Generar la boleta de viaje
            $this->generarBoleta($reserva);

            // Devuelve un mensaje de éxito
            return response()->json(['message' => 'Reserva utilizada exitosamente.'], 200);
        }
    } else {
        // El código de acceso no corresponde a ninguna reserva
        return response()->json(['message' => 'Código de acceso inválido.'], 404);
    }
}
private function generarBoleta(Reserva $reserva)
    {
        // Obtener los datos necesarios del viaje y el pasajero
        $viaje = $reserva->viaje;
        $pasajero = $reserva->user;

        // Incrementar el contador de pasajeros del viaje en 1
        $viaje->aforo_viaje++;

        // Crear una nueva boleta de viaje
        $boleta = new BoletaViaje();
        $boleta->id_usuario_pasajero = $pasajero->id_usuario;
        $boleta->id_usuario_chofer = Auth::id(); // ID del chofer autenticado
        $boleta->id_viaje = $viaje->id_viaje;
        $boleta->id_reserva = $reserva->id_reserva;
        $boleta->fecha_viaje = $reserva->fecha_reserva;
        $boleta->hora_abordaje = Carbon::now()->toTimeString(); // Utiliza la hora de inicio del viaje
        $boleta->aforo_viaje = $viaje->aforo_viaje; // Utiliza el aforo actual del viaje
        $boleta->save();
    }
    
}
