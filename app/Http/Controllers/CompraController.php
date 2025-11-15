<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use App\Mail\CompraProveedorMail;
use App\Models\InventarioSucursalLote;
use App\Models\MovimientoInventario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $compra->estado = 'Pendiente';
        $compra->save();

        return redirect()->route('compras.edit', $compra->id)
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

    public function enviarCorreo(Compra $compra)
    {
        $compra->load('detalleCompras.producto', 'proveedor');
        $proveedorEmail = $compra->proveedor->email;

        $compra->estado = 'Enviado al Proveedor';
        $compra->save();

        Mail::to($proveedorEmail)->send(new CompraProveedorMail($compra));
        return redirect()->route('compras.edit', $compra->id)
        ->with('message', 'Correo enviado exitosamente al proveedor')
        ->with('status', 'success');
    }

    public function finalizarCompra(Request $request, Compra $compra)
    {
        $compra->load('detalleCompras.producto', 'proveedor');
        $detalles = $compra->detalleCompras;

        if($detalles->isEmpty()){
            return redirect()->back()
            ->with('message', 'No se puede finalizar la compra sin productos')
            ->with('status', 'error');
        }

        $request->validate([
            'sucursal_id' => 'required|exists:sucursals,id',
        ]);


        DB::beginTransaction();
        try {
            foreach($detalles as $detalle){
                $lote = $detalle->lote;
                $producto = $detalle->producto;

                // Actualizar la cantidad del lote en la tabla lotes
                $lote->cantidad_actual = $lote->cantidad_actual + $detalle->cantidad;
                $lote->save();

                // Actualizar o crear el registro en inventario_sucursal_lote
                $inventarioLote = InventarioSucursalLote::firstOrCreate([
                    'lote_id' => $lote->id,
                    'sucursal_id' => $request->sucursal_id,
                    'cantidad_sucursal' => 0,
                ]);
                $inventarioLote->cantidad_sucursal = $inventarioLote->cantidad_sucursal + $detalle->cantidad;
                $inventarioLote->save();

                // Registrar el movimiento en la tabla movimiento_inventario
                $movimientoInventario = MovimientoInventario::create([
                    'producto_id' => $producto->id,
                    'lote_id' => $lote->id,
                    'sucursal_id' => $request->sucursal_id,
                    'tipo_movimiento' => 'Entrada',
                    'cantidad' => $detalle->cantidad,
                    'fecha' => now(),
                ]);
            }
            // Actualizar el estado de la compra
            $compra->estado = 'Recibido';
            $compra->save();

            DB::commit();

            return redirect()->route('compras.index')
            ->with('message', 'La compra se finalizó con éxito')
            ->with('status', 'success');

        } catch (\Exception $e) {
            DB::rollBack();
            dd('Error al finalizar la compra', $e->getMessage());
        }
    }

    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->load('detalleCompras.producto', 'proveedor');

        $movimientoEntrada = MovimientoInventario::whereHas('lote', function ($query) use ($compra) {
            $query->whereIn('id', $compra->detalleCompras->pluck('lote_id'));
        })->where('tipo_movimiento', 'Entrada')->first();

        $sucursal_destino = null;
        if($movimientoEntrada){
            $sucursal_destino = Sucursal::find($movimientoEntrada->sucursal_id);
        }
        return view('admin.compras.show', compact('compra', 'sucursal_destino'));
    }


}
