<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        Reserva::create([
            'usuario_id' => auth()->id(),
            'horario_id' => $request->horario_id,
            'asiento' => $request->asiento,
        ]);
        return redirect()->route('reservas.index');
    }

}
