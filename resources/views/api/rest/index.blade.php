@extends('layouts.app')

@section('content')
<div class="container">
    <h1>API REST - Productos</h1>

    @if(session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <form method="GET" class="mb-3">
        <input name="q" value="{{ $query }}" class="form-control" placeholder="Buscar...">
    </form>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <img src="{{ $producto['thumbnail'] }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5>{{ $producto['title'] }}</h5>
                        <p>{{ Str::limit($producto['description'], 100) }}</p>
                        <p><strong>${{ $producto['price'] }}</strong></p>
                        <a href="{{ route('api.rest.show', $producto['id']) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @php $totalPages = ceil($total / $limit); @endphp
    <nav>
        <ul class="pagination">
            @for($i = 1; $i <= $totalPages; $i++)
                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ route('api.rest.index', ['page' => $i, 'q' => $query]) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </nav>
</div>
@endsection
