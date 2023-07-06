<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paradero extends Model
{
    use HasFactory;
    protected $table = 'paraderos';
    protected $primaryKey = 'id_paradero';
    protected $fillable = [
        'id_ruta',
        'nombre',
        'ubicacion',
    ];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta', 'id_ruta');
    }
}
