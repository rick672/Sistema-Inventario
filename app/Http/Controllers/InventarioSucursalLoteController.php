<?php

namespace App\Http\Controllers;

use App\Models\InventarioSucursalLote;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class InventarioSucursalLoteController extends Controller
{
    public function index()
    {
        // $inventario_sucursales_por_lotes = InventarioSucursalLote::with('sucursal')->get();
        $sucursales = Sucursal::withCount('inventarioSucursalLotes')->get();

        foreach ($sucursales as $sucursal) {
            $sucursal->total_inventario = InventarioSucursalLote::where('sucursal_id', $sucursal->id)->sum('cantidad_sucursal');
        }

        // return response()->json($sucursales);
        return view('admin.sucursales_por_lotes.index', compact('sucursales'));
    }
}
