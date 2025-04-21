@extends('layouts.app')

@section('content')
<h1>Editar lugar</h1>

@if ($errors->any())
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif

<form action="{{ route('lugares.update', $lugar) }}" method="post">
	@csrf
	@method('PUT')

	<label>Nombre:
		<input type="text" name="mombre" value="{{ old('nombre', $lugar->nombre) }}">
	</label>

	<label>País:
		<input type="text" name="pais" value="{{ old('pais', $lugar->pais) }}">
	</label><br>

	<label>Latitud:
		<input type="text" name="latitud" value="{{ old('latitud', $lugar->latitud) }}">
	</label><br>

	<label>Longitud:
		<input type="text" name="longitud" value="{{ old('longitud', $lugar->longitud) }}">
	</label><br>

	<button type="submit">Actualizar</button>
</form>
@endsection