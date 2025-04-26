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

	<label for="codigo_postal">Código postal:</label>
	<input id="codigo_postal" type="text" name="codigo_postal" value="{{ old('codigo_postal', $lugar->codigo_postal ?? '') }}">
	@error('codigo_postal')
		div style="color:red">{{ $message }}</div>
	@enderror
	<br>

	<button type="submit">{{ $buttonText }}</button>
</form>