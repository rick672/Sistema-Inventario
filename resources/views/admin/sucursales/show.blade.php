@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Detalle de Sucursal</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/sucursales') }}">Sucursales</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $sucursal->nombre }}</li>
            </ol>
        </nav>
    </div>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-gradient-info">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-eye mr-2"></i> <b>Datos de la Sucursal</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <div class="form-group">
                        {{-- Nombre --}}
                        <label for="nombre">Nombre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" value="{{ $sucursal->nombre }}" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la sucursal" readonly>
                        </div>
                        @error('nombre')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        {{-- Direccion --}}
                        <label for="direccion">Direccion</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" value="{{ $sucursal->direccion }}" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion de la sucursal" readonly>
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
                            <input type="text" value="{{ $sucursal->telefono }}" class="form-control" id="telefono" name="telefono" placeholder="Ingrese numero de telefono" readonly>
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
                                {{ $sucursal->activo ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="activo"><b>Activo</b></label>
                        </div>
                        
                        @error('activo')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ url('/admin/sucursales') }}" class="btn bg-gradient-secondary btn-block">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop