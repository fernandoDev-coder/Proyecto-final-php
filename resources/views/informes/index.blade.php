<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Panel de Informes</h1>

<p>Total de Reservas: {{ $total_reservas }}</p>
<p>Ingresos Totales: ${{ number_format($ingresos_totales, 2) }}</p>

<h2>Reservas por Película</h2>
<ul>
    @foreach($reservas_por_pelicula as $pelicula)
        <li>{{ $pelicula->titulo }}: {{ $pelicula->reservas_count }} reservas</li>
    @endforeach
</ul>

<h2>Reservas por Día</h2>
<ul>
    @foreach($reservas_por_dia as $dia)
        <li>{{ $dia->fecha }}: {{ $dia->total }} reservas</li>
    @endforeach
</ul>


</body>
</html>