<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViajeGps extends Model
{
    use HasFactory;
    protected $table = 'viajes_gps';
    protected $primaryKey = 'id_GPS';
    protected $fillable = ['id_viaje', 'posicion_x', 'posicion_y', 'hora_posicion'];
    public $timestamps = true;

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'id_viaje');
    }
}
