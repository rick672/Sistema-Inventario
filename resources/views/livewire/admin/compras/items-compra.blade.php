<div>
    {{-- The whole world belongs to you. --}}
    <div class="container-fluid">
        <div class="row">
            {{-- Columna izquierda: formulario (6 campos) --}}
            <div class="col-12 col-lg-4">
                <div class="card h-100 shadow-md">
                    <div class="card-body table-responsive">
                        {{-- Aquí van tus 6 campos del formulario --}}
                        <div class="row">
                            <div class="col-12 col-md-8 col-lg-12">
                                <div class="form-group">
                                    {{-- Producto --}}
                                    <label for="productoId">Producto <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <select 
                                            id="productoId" 
                                            wire:model.live="productoId"
                                            class="form-control select2" 
                                            required
                                        >
                                            <option value="">Seleccione una opción</option>
                                            @foreach($productos as $producto)
                                                <option 
                                                    value="{{ $producto->id }}"
                                                >
                                                    {{ $producto->codigo. ' - ' .$producto->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('productoId')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6">
                                <div class="form-group">
                                    {{-- Lote --}}
                                    <label for="lote">Lote <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <input
                                            wire:model="codigoLote"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Ingrese el lote"
                                            required
                                        >
                                    </div>
                                    @error('codigoLote')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-2 col-lg-6">
                                <div class="form-group">
                                    {{-- Cantidad --}}
                                    <label for="cantidad">Cantidad <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <input 
                                            wire:model="cantidad"
                                            min="1"
                                            style="text-align: center"
                                            type="number"  
                                            class="form-control" 
                                            required
                                        >
                                    </div>
                                    @error('cantidad')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-6">
                                <div class="form-group">
                                    {{-- Precio Unitario --}}
                                    <label for="precioCompra">Precio Compra <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <input 
                                            wire:model="precioCompra"
                                            min="1"
                                            style="text-align: center"
                                            type="number"
                                            class="form-control" 
                                            placeholder="Ingrese el precio"
                                            required
                                        >
                                    </div>
                                    @error('precioCompra')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-6">
                                <div class="form-group">
                                    {{-- Precio Unitario --}}
                                    <label for="precioVenta">Precio Venta <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <input 
                                            wire:model="precioVenta"
                                            min="1"
                                            style="text-align: center"
                                            type="number"
                                            class="form-control" 
                                            placeholder="Ingrese el precio venta"
                                            required
                                        >
                                    </div>
                                    @error('precioVenta')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-12">
                                <div class="form-group">
                                    {{-- Fecha Vencimiento --}}
                                    <label for="fecha_vencimiento">Fecha Vencimiento</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <input 
                                            wire:model="fechaVencimiento"
                                            type="date"
                                            value="{{ old('fecha_vencimiento') }}" 
                                            class="form-control" 
                                        >
                                    </div>
                                    @error('fechaVencimiento')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group" style="margin: 0;">
                                    <button type="submit" class="btn bg-gradient-success btn-block" wire:click="agregarItems">
                                        <i class="fas fa-plus"></i> Agregar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Columna derecha: tabla --}}
            <div class="col-12 col-lg-8 mt-4 mt-lg-0">
                <div class="card h-100 shadow-md">
                    <div class="card-body table-responsive">
                        {{-- Aquí va tu tabla de productos --}}
                        @if ($compra->detalleCompras->count() > 0)
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="fas fa-shopping-cart mr-2"></i> Productos de la compra</h5>
                                </div>

                                <div class="card-body table-responsive">
                                    <table id="dataTable" class="table table-hover align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Producto</th>
                                                <th>Imagen</th>
                                                <th>Lote</th>
                                                <th class="text-center">Cantidad</th>
                                                <th class="text-center">P / U</th>
                                                <th class="text-center">Subtotal</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($compra->detalleCompras as $detalle)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span class="font-weight-bold">{{ $detalle->producto->nombre }}</span>
                                                    </td>
                                                    <td>
                                                        <img 
                                                            src="{{ asset('storage/' . $detalle->producto->imagen) }}" 
                                                            alt="{{ $detalle->producto->nombre }}" 
                                                            class="rounded mr-2" 
                                                            style="width: 60px; height: 60px; object-fit: cover;"
                                                        >
                                                    </td>
                                                    <td>{{ $detalle->lote->codigo_lote }}</td>
                                                    <td class="text-center">{{ $detalle->cantidad }}</td>
                                                    <td class="text-center">{{ number_format($detalle->precio_unitario, 2) }} Bs</td>
                                                    <td class="text-center text-success font-weight-bold">{{ number_format($detalle->subtotal, 2) }} Bs</td>
                                                    <td class="text-center">
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-sm btn-outline-danger"
                                                            wire:click="borrarItem({{ $detalle->id }})"
                                                            title="Eliminar producto"
                                                        >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer bg-light text-right">
                                    <h4 class="mb-0">
                                        <strong>Total:</strong> 
                                        <span class="text-primary font-weight-bold ">{{ number_format($totalCompra, 2) }} Bs</span>
                                    </h4>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info text-center mt-4" role="alert">
                                <i class="fas fa-info-circle mr-2"></i> No hay productos en esta compra.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div 
        x-data 
        x-on:mostrar-alert.window="
            Swal.fire({
                icon: $event.detail.icon,
                text: $event.detail.message,
                showConfirmButton: false,
                timer: 2000
            })
        "
    >
    </div>
    


</div>
