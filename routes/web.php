<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\InformeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de películas
    Route::resource('peliculas', PeliculaController::class);

    // Gestión de horarios y reservas
    Route::post('horarios', [HorarioController::class, 'store']);
    Route::post('reservas', [ReservaController::class, 'store']);

    // Ruta de informes solo para administradores
    Route::get('/informes', [InformeController::class, 'index'])
        ->middleware('rol:admin') // Protegido para solo admin
        ->name('informes.index');
});

require __DIR__ . '/auth.php';
