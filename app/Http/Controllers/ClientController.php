<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('clients.create');
    }

    // Almacenar un nuevo cliente en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:clients',
            'direccion' => 'required|string',
        ]);

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Cliente agregado correctamente.');
    }

    // Mostrar el formulario de edición de un cliente
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    // Actualizar un cliente en la base de datos
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
            'direccion' => 'required|string',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
    }

}
