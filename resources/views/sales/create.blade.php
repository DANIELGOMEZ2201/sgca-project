@extends('layouts.app')

@section('title', 'Registrar Venta')

@section('content')
<div class="container">
    <h1>Registrar Venta</h1>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select class="form-select" id="vehiculo_id" name="vehiculo_id" required>
                <option value="">Selecciona un vehículo</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->marca }} {{ $vehicle->modelo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select class="form-select" id="cliente_id" name="cliente_id" required>
                <option value="">Selecciona un cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nombre }} {{ $client->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_venta" class="form-label">Fecha de Venta</label>
            <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" required>
        </div>
        <div class="mb-3">
            <label for="precio_final" class="form-label">Precio Final</label>
            <input type="number" class="form-control" id="precio_final" name="precio_final" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>
</div>
@endsection
6. edit.blade.php (Formulario de Edición de Venta)
blade
Copiar código
@extends('layouts.app')

@section('title', 'Editar Venta')

@section('content')
<div class="container">
    <h1>Editar Venta</h1>

    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select class="form-select" id="vehiculo_id" name="vehiculo_id" required>
                <option value="">Selecciona un vehículo</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ $vehicle->id == $sale->vehiculo_id ? 'selected' : '' }}>
                        {{ $vehicle->marca }} {{ $vehicle->modelo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select class="form-select" id="cliente_id" name="cliente_id" required>
                <option value="">Selecciona un cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $sale->cliente_id ? 'selected' : '' }}>
                        {{ $client->nombre }} {{ $client->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_venta" class="form-label">Fecha de Venta</label>
            <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" value="{{ $sale->fecha_venta }}" required>
        </div>
        <div class="mb-3">
            <label for="precio_final" class="form-label">Precio Final</label>
            <input type="number" class="form-control" id="precio_final" name="precio_final" value="{{ $sale->precio_final }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Venta</button>
    </form>
</div>
@endsection
