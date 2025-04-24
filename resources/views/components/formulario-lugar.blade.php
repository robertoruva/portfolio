<form action="{{ $action }}" method="POST">
	@csrf

	@if ($method === 'PUT')
	@method('PUT')
	@endif

	<label for="nombre">Nombre:</label>
	<input id="nombre" type="text" name="nombre" value="{{ old('nombre', $lugar->nombre ?? '') }}">
	@error('nombre')
		<div style="color:red">{{ $message }}</div>
	@enderror
	<br>

	<label for="pais">País:</label>
	<input id="pais" type="text" name="pais" value="{{ old('pais', $lugar->pais ?? '') }}">
	@error('pais')
		<div style="color:red">{{ $message }}</div>
	@enderror
	<br>

	<label for="latitud">Latitud:</label>
	<input id="latitud" type="text" name="latitud" value="{{ old('latitud', $lugar->latitud ?? '') }}">
	@error('latitud')
		<div style="color:red">{{ $message }}</div>
	@enderror
	<br>

	<label for="longitud">Longitud:</label>
	<input id="longitud" type="text" name="longitud" value="{{ old('longitud', $lugar->longitud ?? '') }}">
	@error('longitud')
		div style="color:red">{{ $message }}</div>
	@enderror
	<br>

	<button type="submit">{{ $buttonText }}</button>
</form>