@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Integraciones API en Laravel</h1>
    <p class="text-muted">Explora los tres tipos principales de consumo de APIs.</p>

    <ul class="list-group mt-4">
        <li class="list-group-item">
            <a href="{{ route('api.rest.index') }}">1. API REST ? Gestión de productos</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('api.websocket') }}">2. API WebSocket ? Tiempo real con notificaciones</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('api.soap') }}">3. API SOAP ? Calculadora SOAP</a>
        </li>
    </ul>
</div>
@endsection
