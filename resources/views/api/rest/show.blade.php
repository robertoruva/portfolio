@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('api.rest.index') }}" class="btn btn-sm btn-outline-secondary mb-3">? Volver</a>

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $producto['thumbnail'] }}" class="img-fluid rounded-start" alt="{{ $producto['title'] }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2>{{ $producto['title'] }}</h2>
                    <p>{{ $producto['description'] }}</p>
                    <p><strong>Precio:</strong> ${{ $producto['price'] }}</p>
                    <p><strong>Marca:</strong> {{ $producto['brand'] }}</p>
                    <p><strong>Categoría:</strong> {{ $producto['category'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
