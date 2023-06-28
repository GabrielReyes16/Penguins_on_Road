<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'id_perfil';
    protected $fillable = ['nombre', 'apellidos', 'biografia', 'especialidad', 'enlaces', 'foto_perfil'];
    public $timestamps = true;
}
