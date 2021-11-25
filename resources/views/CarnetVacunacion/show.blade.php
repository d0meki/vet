@extends ('EnlacedelDashboardponeraca')
@section('contenido')
<h1>Mostrando datos</h1>
<p>ID:{{ $CV->id }}</p>
<p>Nombre: {{ $CV->descripcion }}</p>
<p>Descripcion: {{ $CV->fecha_vacuna }}</p>
<p>Cantidad de publicaciones: {{ $CV->fecha_proxima }}</p>
<a href="{{route('CarnetVacunacion.index')}}">volver a lista de carnets de vacunacion</a>
@stop