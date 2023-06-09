<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     protected $table = 'users';

     protected $guarded = [];
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_perfil'
    ];
    public $timestamps = true;

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }
    public function chofer()
    {
        return $this->hasOne(Chofer::class, 'id_usuario');
    }
    public function reserva()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
    static $rules = [
		'name' => 'required',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',

    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


}
