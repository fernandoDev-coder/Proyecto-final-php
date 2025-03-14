<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['pelicula_id', 'fecha', 'hora'];

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
