<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventarioSucursalLote extends Model
{
    protected $table = 'inventario_sucursal_lotes';

    protected $fillable = [
        'lote_id',
        'sucursal_id',
        'cantidad_sucursal',
    ];

    public function lote(): BelongsTo
    {
        return $this->belongsTo(Lote::class);
    }

    public function sucursal(): BelongsTo
    {
        return $this->belongsTo(Sucursal::class);
    }
}
