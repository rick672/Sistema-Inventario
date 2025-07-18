@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Editar Sucursal</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/sucursales') }}">Sucursales</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header bg-gradient-success">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-plus-circle mr-2"></i> <b>Editar registro</b>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/sucursales/'. $sucursal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            {{-- Nombre --}}
                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <input type="text" value="{{ old('nombre', $sucursal->nombre) }}" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la sucursal" required>
                            </div>
                            @error('nombre')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            {{-- Direccion --}}
                            <label for="direccion">Direccion <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" value="{{ old('direccion', $sucursal->direccion) }}" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion de la sucursal" required>
                            </div>
                            @error('direccion')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            {{-- Telefono --}}
                            <label for="telefono">Telefono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" value="{{ old('telefono', $sucursal->telefono) }}" class="form-control" id="telefono" name="telefono" placeholder="Ingrese numero de telefono">
                            </div>
                            @error('telefono')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            
                            {{-- Estado un checkbox --}}
                            <div class="form-check form-check-inline">
                                <!-- Truco: valor por defecto si no se marca -->
                                <input type="hidden" name="activo" value="0">

                                <!-- Checkbox -->
                                <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1"
                                    {{ old('activo', $sucursal->activo) ? 'checked' : '' }}>
                                <label class="form-check-label" for="activo"><b>Activo</b></label>
                            </div>
                            
                            @error('activo')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 mb-2">
                                <a href="{{ url('/admin/sucursales') }}" class="btn btn-secondary btn-block">
                                    <i class="fas fa-arrow-left"></i> Cancelar
                                </a>
                            </div>
                            <div class="col-12 col-sm-6">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-save"></i> Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop