@extends('layouts.app')

@section('content')
	<h1>Nuevo lugar</h1>

	<x-formulario-lugar
		:action="route('lugares.store')"
		method="POST"
		button-text="Crear Lugar"
	/>
@endsection