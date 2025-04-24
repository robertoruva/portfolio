@extends('layouts.app')

@section('content')
	<h1>Editar lugar</h1>

	<x-formulario-lugar 
		:action="route('lugares.update', $lugar)"
		method="PUT"
		:lugar="$lugar"
		button-text="Actualizar Lugar"
	/>
@endsection