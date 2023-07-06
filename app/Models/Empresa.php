<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $primaryKey = 'id_empresa';
    protected $fillable = ['RUC', 'nombre', 'ubicacion'];
    public $timestamps = true;

    public function buses()
    {
        return $this->hasMany(Bus::class, 'id_empresa', 'id_empresa');
    }

    public function choferes()
    {
        return $this->hasMany(Chofer::class, 'id_empresa', 'id_empresa');
    }
}
