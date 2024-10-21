<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with(['vehicle', 'client'])->get();
        return view('sales.index', compact('sales'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        $vehicles = Vehicle::all();
        $clients = Client::all();
        return view('sales.create', compact('vehicles', 'clients'));
    }

    // Almacenar una nueva venta en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehiculo_id' => 'required|exists:vehicles,id',
            'cliente_id' => 'required|exists:clients,id',
            'fecha_venta' => 'required|date',
            'precio_final' => 'required|numeric',
        ]);

        Sale::create($validatedData);

        return redirect()->route('sales.index')->with('success', 'Venta registrada correctamente.');
    }

    // Mostrar el formulario de edición de una venta
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $vehicles = Vehicle::all();
        $clients = Client::all();
        return view('sales.edit', compact('sale', 'vehicles', 'clients'));
    }

    // Actualizar una venta en la base de datos
    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $validatedData = $request->validate([
            'vehiculo_id' => 'required|exists:vehicles,id',
            'cliente_id' => 'required|exists:clients,id',
            'fecha_venta' => 'required|date',
            'precio_final' => 'required|numeric',
        ]);

        $sale->update($validatedData);

        return redirect()->route('sales.index')->with('success', 'Venta actualizada correctamente.');
    }

    // Eliminar una venta
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Venta eliminada correctamente.');
    }

}
