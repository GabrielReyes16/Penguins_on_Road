<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'rutas';
    protected $primaryKey = 'id_ruta';
    protected $fillable = [
        'id_turno',
        'punto_inicial',
        'punto_final',
    ];

    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno', 'id_turno');
    }

    public function paraderos()
    {
        return $this->hasMany(Paradero::class, 'id_ruta', 'id_ruta');
    }

    public function viajes()
    {
        return $this->hasMany(Viaje::class, 'id_ruta', 'id_ruta');
    }
}
