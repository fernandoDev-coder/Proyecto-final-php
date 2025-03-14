<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Horario;
use App\Models\Reserva;
use App\Models\User;
use Carbon\Carbon;

class InformeController extends Controller
{
    // Mostrar un resumen de los informes en una vista
    public function index()
    {
        $total_reservas = Reserva::count();
        $ingresos_totales = Reserva::sum('precio');
        $reservas_por_pelicula = Pelicula::withCount('reservas')->get();
        $reservas_por_dia = Reserva::selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
            ->groupBy('fecha')
            ->get();

        return view('informes.index', compact(
            'total_reservas',
            'ingresos_totales',
            'reservas_por_pelicula',
            'reservas_por_dia'
        ));
    }

    // Obtener informes de una película específica
    public function pelicula($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $reservas = Reserva::whereHas('horario', function ($query) use ($id) {
            $query->where('pelicula_id', $id);
        })->get();

        return view('informes.pelicula', compact('pelicula', 'reservas'));
    }
}
