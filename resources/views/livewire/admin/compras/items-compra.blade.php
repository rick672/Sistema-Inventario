<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">
        <div class="col-12 col-md-8 col-lg-4">
            <div class="form-group">
                {{-- Nombre --}}
                <label for="producto_id">Producto <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <select name="" id="" class="form-control select2" required>
                        <option value="">Seleccione una opción</option>
                        @foreach($productos as $producto)
                            <option 
                            value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}
                            >
                            {{ $producto->codigo. ' - ' .$producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('producto_id')
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
                        type="text" 
                        value="{{ old('lote') }}" 
                        class="form-control" 
                        id="lote" name="lote" 
                        placeholder="Ingrese el lote"
                        required
                    >
                </div>
                @error('lote')
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
                        min="1"
                        style="text-align: center"
                        type="number" 
                        value="{{ old('cantidad') }}" 
                        class="form-control" 
                        id="cantidad" name="codigo" 
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
                        min="1"
                        style="text-align: center"
                        type="number" 
                        value="{{ old('precio_unitario') }}" 
                        class="form-control" 
                        id="precio_unitario" name="precio_unitario" 
                        placeholder="Ingrese el precio"
                        required
                    >
                </div>
                @error('precio_unitario')
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
                        type="date"
                        value="{{ old('fecha_vencimiento') }}" 
                        class="form-control" 
                    >
                </div>
                @error('fecha_vencimiento')
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
                <button type="submit" class="btn bg-gradient-info btn-block" wire:click="prueba">
                    <i class="fas fa-plus"></i> Agregar Producto
                </button>
            </div>
        </div>
    </div>
    <hr>
    Cantidad: {{ $cantidad }}
</div>
