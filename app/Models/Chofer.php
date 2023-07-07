<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;
    protected $table = 'choferes';
    protected $primaryKey = 'id_chofer';
    protected $fillable = [
        'id_usuario',
        'id_bus',
        'id_empresa',
        'licencia_conducir',    
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
    public function viaje()
    {
        return $this->hasMany(Viaje::class, 'id_chofer', 'id_chofer');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id_bus');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }
}
