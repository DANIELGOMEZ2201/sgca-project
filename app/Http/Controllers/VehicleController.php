<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $vehicles = Vehicle::all();
    return view('vehicles.index', compact('vehicles'));
}

public function create()
{
    return view('vehicles.create');
}

public function store(Request $request)
{
    $vehicle = Vehicle::create($request->all());
    return redirect()->route('vehicles.index');
}

public function edit($id)
{
    $vehicle = Vehicle::findOrFail($id);
    return view('vehicles.edit', compact('vehicle'));
}

public function update(Request $request, $id)
{
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->update($request->all());
    return redirect()->route('vehicles.index');
}

public function destroy($id)
{
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->delete();
    return redirect()->route('vehicles.index');
}

}
