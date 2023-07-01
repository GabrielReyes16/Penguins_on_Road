<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BoletasViaje
 *
 * @property $id_boleta
 * @property $id_usuario_pasajero
 * @property $id_usuario_chofer
 * @property $id_viaje
 * @property $fecha_viaje
 * @property $hora_abordaje
 * @property $aforo_viaje
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property User $user
 * @property Viaje $viaje
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BoletasViaje extends Model
{
    
    static $rules = [
		'id_boleta' => 'required',
		'id_usuario_pasajero' => 'required',
		'id_usuario_chofer' => 'required',
		'id_viaje' => 'required',
		'fecha_viaje' => 'required',
		'hora_abordaje' => 'required',
		'aforo_viaje' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_boleta','id_usuario_pasajero','id_usuario_chofer','id_viaje','fecha_viaje','hora_abordaje','aforo_viaje'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id_usuario', 'id_usuario_chofer');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id_usuario', 'id_usuario_pasajero');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function viaje()
    {
        return $this->hasOne('App\Models\Viaje', 'id_viaje', 'id_viaje');
    }
    

}
