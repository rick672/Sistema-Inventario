<?php

namespace App\Livewire\Admin\Compras;

use App\Models\Compra;
use App\Models\Lote;
use App\Models\Producto;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ItemsCompra extends Component
{
    public Compra $compra;

    public $productoId;
    public $cantidad = 1;
    public $precioUnitario;
    public $precioCompra;
    public $precioVenta;
    public $fechaVencimiento;
    public $codigoLote;
    public $productos;
    public $totalCompra;

    public function mount(Compra $compra)
    {
        $this->compra = $compra;
        $this->productos = Producto::all();
        $this->cargarDatosCompra();
    }

    public function cargarDatosCompra(){
        $this->compra->load('detalleCompras.producto', 'detalleCompras.lote');
        $this->totalCompra = $this->compra->detalleCompras->sum('subtotal');

        // reiniciar variables
        $this->reset(['productoId', 'cantidad', 'precioUnitario', 'precioCompra', 'precioVenta', 'fechaVencimiento', 'codigoLote']);
        $this->cantidad = 1;
    }

    public function agregarItems(){
        $this->validate();

        DB::beginTransaction();
        try {
            $producto = Producto::find($this->productoId);
            $loteId = null;

            // Creación de lote
            $lote = Lote::create([
                'producto_id' => $producto->id,
                'proveedor_id' => $this->compra->proveedor_id,
                'codigo_lote' => $this->codigoLote,
                'fecha_entrada' => now()->toDateString(),
                'fecha_vencimiento' => $this->fechaVencimiento,
                'cantidad_inicial' => 0,
                'cantidad_actual' => 0,
                'precio_compra' => $this->precioCompra,
                'precio_venta' => $this->precioVenta,
                'estado' => true,
            ]);
            $loteId = $lote->id;

            // Creación de detalle de compra
            $this->compra->detalleCompras()->create([
                'producto_id' => $producto->id,
                'lote_id' => $loteId,
                'cantidad' => $this->cantidad,
                'precio_unitario' => $this->precioUnitario,
                'subtotal' => $this->cantidad * $this->precioUnitario,
            ]);

            // Recalcular total de la compra
            $this->compra->total = $this->compra->detalleCompras->sum('subtotal');
            $this->compra->save();

            DB::commit();
            $this->cargarDatosCompra();


        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.admin.compras.items-compra');
    }

    public function prueba()
    {
        $this->cantidad = $this->cantidad + 1;
    }
}
