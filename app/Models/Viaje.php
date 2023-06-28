<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;
    protected $table = 'viajes';
    protected $primaryKey = 'id_viaje';
    protected $fillable = ['id_ruta', 'id_bus', 'fecha_viaje', 'hora_inicio', 'hora_final', 'estado', 'aforo'];
    public $timestamps = true;

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus');
    }
}
