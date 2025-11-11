<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return view('admin.compras.index', compact('compras'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $sucursales = Sucursal::all();
        return view('admin.compras.create', compact('proveedores', 'productos', 'sucursales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        $compra = new Compra();
        $compra->proveedor_id = $request->proveedor_id;
        $compra->fecha = $request->fecha;
        $compra->observaciones = $request->observaciones;
        $compra->total = 0;
        $compra->estado = 'pendiente';
        $compra->save();

        return redirect()->route('compra.edit', $compra->id)
        ->with('message', 'Compra creada correctamente, ahora puedes agregar productos')
        ->with('status', 'success');
    }

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $sucursales = Sucursal::all();
        return view('admin.compras.edit', compact('compra', 'proveedores', 'productos', 'sucursales'));
    }


}
