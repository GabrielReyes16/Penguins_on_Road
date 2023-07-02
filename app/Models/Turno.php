<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $table = 'turnos';
    protected $primaryKey = 'id_turno';
    protected $fillable = ['nombre', 'hora_inicio'];
    public $timestamps = true;

    static $rules = [
		'name' => 'required',
		'hora_inicio' => 'required',
    ];
}
