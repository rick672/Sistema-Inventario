<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">
        <div class="col-12 col-md-8 col-lg-4">
            <div class="form-group">
                {{-- Producto --}}
                <label for="producto_id">Producto <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <select name="" id="" wire:model="productoId" class="form-control select2" required>
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
        <div class="col-12 col-md-4 col-lg-2">
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
        <div class="col-6 col-md-4 col-lg-2">
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
                        placeholder="Ingrese la cantidad"
                        required
                    >
                </div>
                @error('cantidad')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="form-group">
                {{-- Precio Unitario --}}
                <label for="precio_unitario">Precio Unitario <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input 
                        wire:model="precioUnitario"
                        min="1"
                        style="text-align: center"
                        type="number"
                        class="form-control" 
                        placeholder="Ingrese el precio"
                        required
                    >
                </div>
                @error('precioUnitario')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
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
        <div class="col col-12 col-md-6 col-lg-9">
            
        </div>
        <div class="col col-12 col-md-6 col-lg-3">
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-info btn-block" wire:click="agregarItems">
                    <i class="fas fa-plus"></i> Agregar Producto
                </button>
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
