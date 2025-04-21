@extends('layouts.app')

@section()
<h1>Lugares</h1>
<a href="{{ route('lugares.create') }}"> Nuevo lugar</a>

<ul>
	@foreach ( $lugares as $lugar )
	<li>
		{{ $lugar->nombre }} ({{ $lugar->pais }})
		<a href="{{ route('lugar.edit', $lugar) }}">Editar</a>
		<form action="{{ route('lugares.destroy', $lugar) }}" method="post" style="display:inline">
			@csrf
			@method('DELETE')
			<button type="submit">Eliminar</button>
		</form>
	</li>
	@endforeach
</ul>
@endsection