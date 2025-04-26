@extends('layouts.app')

@section('content')
	<h1>{{ $lugar->nombre }} ({{ $lugar->pais }})</h1>

	@if($clima)
		<p>Temperatura: {{ $clima['main']['temp'] }} °C</p>
		<p>Humedad: {{ $clima['main']['humidity'] }} %</p>
		<p>Estado: {{ $clima['weather'][0]['description'] }}</p>
	@else
		<p>No se pudo obtener el clima actual.</p>
	@endif

@endsection