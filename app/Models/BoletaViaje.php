<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletaViaje extends Model
{
    use HasFactory;
    protected $table = 'boletas_viaje';
    protected $primaryKey = 'id_boleta';
    protected $fillable = [
        'id_usuario_pasajero',
        'id_usuario_chofer',
        'id_viaje',
        'fecha_viaje',
        'hora_abordaje',
        'aforo_viaje',
        'codigo_qr',
    ];

    public function pasajero()
    {
        return $this->belongsTo(User::class, 'id_usuario_pasajero', 'id_usuario');
    }

    public function chofer()
    {
        return $this->belongsTo(User::class, 'id_usuario_chofer', 'id_usuario');
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'id_viaje', 'id_viaje');
    }
}
