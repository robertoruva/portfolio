@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear producto (simulado)</h1>

    <form method="POST" action="{{ route('api.rest.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input name="price" type="number" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Crear</button>
    </form>
</div>
@endsection
