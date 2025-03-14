<?php

namespace App\Http\Controllers;
use App\Models\Horario;

use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function store(Request $request)
    {
        Horario::create($request->all());
        return redirect()->route('peliculas.index');
    }

}
