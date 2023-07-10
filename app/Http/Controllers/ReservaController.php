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
    $idUsuario = Auth::id();

    $currentDate = Carbon::now()->toDateString();

    $reservaExistente = Reserva::where('id_usuario', $idUsuario)
        ->where('fecha_reserva', $currentDate)
        ->first();

    if ($reservaExistente) {

        return redirect()->route('usuario-pasajero.mostrar_reserva', ['codigo' => $reservaExistente->codigoDeAcceso]);
    } else {

        $viajes = Viaje::where('estado', 'Activo')->get();

        return view('usuario-pasajero.formulario_reserva', ['id_usuario' => $idUsuario, 'viajes' => $viajes]);
    }
}

public function editarReserva($codigo)
{
    $reserva = Reserva::where('codigoDeAcceso', $codigo)->firstOrFail();

    $viajes = Viaje::where('estado', 'Activo')->get();

    return view('usuario-pasajero.editar_reserva', ['reserva' => $reserva, 'viajes' => $viajes]);
}


public function actualizarReserva(Request $request, $codigo)
{
    $request->validate([
        'id_viaje' => 'required',
    ]);

    $reserva = Reserva::where('codigoDeAcceso', $codigo)->firstOrFail();

    $reserva->id_viaje = $request->input('id_viaje');
    $reserva->save();

    return redirect()->route('usuario-pasajero.mostrar_reserva', ['codigo' => $reserva->codigoDeAcceso]);
}


    public function guardarReserva(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_usuario' => 'required',
            'id_viaje' => 'required',
        ]);

        $reserva = new Reserva();
        $reserva->id_usuario = $request->input('id_usuario');
        $reserva->id_viaje = $request->input('id_viaje');
        $reserva->fecha_reserva = Carbon::now()->toDateString();
        $codigo = Str::random(10);

        $reserva->codigoDeAcceso = $codigo;


        $codigoQR = $this->generarCodigoQR($codigo);

        $reserva->codigo_qr = $codigoQR;
        $reserva->save();
        

        return redirect()->route('usuario-pasajero.mostrar_reserva', ['codigo' => $reserva->codigoDeAcceso]);
    }

    //
    public function mostrarReserva($codigo)
{
    $reserva = Reserva::where('codigoDeAcceso', $codigo)->first();
    
    if ($reserva) {
        $codigoQR = $reserva->codigo_qr;
        return view('usuario-pasajero.mostrar_reserva', ['reserva' => $reserva, 'codigoQR' => $codigoQR]);
    } else {

        return redirect()->route('pagina_de_error');
    }
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

    $reserva = Reserva::where('codigoDeAcceso', $codigoDeAcceso)->first();

    if ($reserva) {
        if ($reserva->utilizada) {
            return response()->json(['message' => 'Esta reserva ya ha sido utilizada.'], 200);
        } else {

            $reserva->utilizada = true;
            $reserva->save();

            $this->generarBoleta($reserva);

            return response()->json(['message' => 'Reserva utilizada exitosamente.'], 200);
        }
    } else {
        return response()->json(['message' => 'Código de acceso inválido.'], 404);
    }
}
private function generarBoleta(Reserva $reserva)
    {

        $viaje = $reserva->viaje;
        $pasajero = $reserva->user;

        $viaje->aforo_viaje++;

        $boleta = new BoletaViaje();
        $boleta->id_usuario_pasajero = $pasajero->id_usuario;
        $boleta->id_viaje = $viaje->id_viaje;
        $boleta->id_reserva = $reserva->id_reserva;
        $boleta->fecha_viaje = $reserva->fecha_reserva;
        $boleta->hora_abordaje = Carbon::now()->timezone('America/Lima')->toTimeString(); 
        $boleta->aforo_viaje = $viaje->aforo_viaje; 
        $boleta->save();
    }
    
}
