<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('admin.sucursales.index', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sucursales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json(request()->all());
        $request->validate([
            'nombre' => 'required|string|max:25',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:30',
            'activo' => 'boolean',
        ]);

        $sucursal = new Sucursal();
        $sucursal->nombre = $request->nombre;
        $sucursal->direccion = $request->direccion;
        $sucursal->telefono = $request->telefono;
        $sucursal->activo = $request->activo;
        $sucursal->save();

        return redirect()->route('sucursales.index')
        ->with('message', 'Sucursal creada correctamente')
        ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('admin.sucursales.show', compact('sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('admin.sucursales.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json(request()->all());
        $request->validate([
            'nombre' => 'required|string|max:25',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:30',
            'activo' => 'boolean',
        ]);

        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $request->nombre;
        $sucursal->direccion = $request->direccion;
        $sucursal->telefono = $request->telefono;
        $sucursal->activo = $request->activo;
        $sucursal->update();

        return redirect()->route('sucursales.index')
        ->with('message', 'Sucursal actualizada correctamente')
        ->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sucursal = Sucursal::findOrfail($id);
        $sucursal->delete();

        return redirect()->route('sucursales.index')
        ->with('message', 'Sucursal eliminada correctamente')
        ->with('status', 'success');
    }
}
