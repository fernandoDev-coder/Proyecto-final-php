<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'genero', 'imagen'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function reservas()
    {
        return $this->hasManyThrough(Reserva::class, Horario::class);
    }
}
