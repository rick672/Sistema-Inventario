<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sucursal extends Model
{
    /** @use HasFactory<\Database\Factories\SucursalFactory> */
    use HasFactory;

    protected $table = 'sucursals';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'activo',
    ];

    public function inventarioSucursalLotes(): HasMany
    {
        return $this->hasMany(InventarioSucursalLote::class);
    }
}
