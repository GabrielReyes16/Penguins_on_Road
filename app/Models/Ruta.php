<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'rutas';
    protected $primaryKey = 'id_ruta';
    protected $fillable = ['id_turno', 'punto_inicial', 'punto_final'];
    public $timestamps = true;

    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno');
    }
}
