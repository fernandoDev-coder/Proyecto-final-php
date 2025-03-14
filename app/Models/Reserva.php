<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'horario_id', 'asiento', 'precio'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}
