@extends('layouts.app')

@section('title', 'Listado de Clientes')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Agregar Cliente</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nombre }}</td>
                <td>{{ $client->apellido }}</td>
                <td>{{ $client->telefono }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->direccion }}</td>
                <td>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
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
