@extends('layouts.app')

@section('title', 'Listado de Ventas')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Ventas</h1>
    <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Registrar Venta</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehículo</th>
                <th>Cliente</th>
                <th>Fecha de Venta</th>
                <th>Precio Final</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->vehicle->marca }} {{ $sale->vehicle->modelo }}</td>
                <td>{{ $sale->client->nombre }} {{ $sale->client->apellido }}</td>
                <td>{{ $sale->fecha_venta }}</td>
                <td>{{ $sale->precio_final }}</td>
                <td>
                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
