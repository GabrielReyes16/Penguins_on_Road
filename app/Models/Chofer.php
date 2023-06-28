<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;
    protected $table = 'choferes';
    protected $primaryKey = 'id_chofer';
    protected $fillable = ['id_usuario', 'licencia_conducir'];
    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
