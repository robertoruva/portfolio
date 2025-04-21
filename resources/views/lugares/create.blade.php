@extends('layouts.app')

@section('content')
<h1>Nuevo lugar</h1>

@if ($errors->any())
<ul>
	@foreach ( $errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif

<form action="{{ route('lugares.store') }}" method="post">
	@csrf
	<label>Nombre: <input type="text" name="nombre" value="{{ old('nombre') }}"></label><br>
	<label>País: <input type="text" name="pais" value="{{ old('pais') }}"></label><br>
	<label>Latitud: <input type="text" name="latitud" value="{{ old('latitud') }}"></label><br>
	<label>Longitud: <input type="text" name="longitud" value="{{ old('longitud') }}"></label><br>
	<button type="submit">Guardar</button>
</form>
@endsection