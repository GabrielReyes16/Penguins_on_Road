<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;
    protected $table = 'viajes';
    protected $primaryKey = 'id_viaje';
    protected $fillable = [
        'id_ruta',
        'id_bus',
        'id_chofer',
        'fecha_viaje',
        'hora_inicio',
        'hora_final',
        'estado',
        'aforo_actual',
    ];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta', 'id_ruta');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id_bus');
    }
    public function chofer()
    {
        return $this->hasMany(Chofer::class, 'id_chofer', 'id_chofer');
    }
    public function boletas()
    {
        return $this->hasMany(BoletaViaje::class, 'id_viaje', 'id_viaje');
    }

    public function viajesGPS()
    {
        return $this->hasMany(ViajeGPS::class, 'id_viaje', 'id_viaje');
    }
}
