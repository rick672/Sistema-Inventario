@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Ver Producto</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/productos') }}">Producto</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Ver</li>
            </ol>
        </nav>
    </div>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-info">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-plus-circle mr-2"></i> <b>Detalle del Producto</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col col-12 col-md-7 col-lg-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{-- Categoria --}}
                                        <label for="nombre">Categoria</label>
                                        <input type="text" class="form-control bg-light" value="{{ $producto->categoria->nombre }}"  name="categoria_id" disabled>
                                    </div>
                                </div>
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                        {{-- Codigo --}}
                                        <label for="codigo">Codigo </label>
                                        <input type="text" class="form-control bg-light" value="{{ $producto->codigo }}"  name="codigo" id="codigo" disabled>
                                    </div>
                                </div>
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                        {{-- Nombre --}}
                                        <label for="nombre">Nombre </label>
                                        <input type="text" class="form-control bg-light" value="{{ $producto->nombre }}"  name="nombre" id="nombre" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{-- Descripcion --}}
                                        <label for="descripcion">Descripcion </label>
                                        <div class="form-control bg-light" id="descripcion" style="min-height:60px;">{!! $producto->descripcion !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                        {{-- Precio Compra --}}
                                        <label for="precio_compra">Precio Compra </label>
                                        <input style="text-align: center" type="number" class="form-control bg-light" value="{{ $producto->precio_compra }}"  name="precio_compra" id="precio_compra" disabled>
                                    </div>
                                </div>
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                        {{-- Precio Venta --}}
                                        <label for="precio_venta">Precio Venta </label>
                                        <input style="text-align: center" type="number" class="form-control bg-light" value="{{ $producto->precio_venta }}"  name="precio_venta" id="precio_venta" disabled>
                                    </div>
                                </div>
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                        {{-- Stock Minimo  --}}
                                        <label for="stock_minimo">Stock Minimo </label>
                                        <input style="text-align: center" type="number" class="form-control bg-light" value="{{ $producto->stock_minimo }}"  name="stock_minimo" id="stock_minimo" disabled>
                                    </div>
                                </div>
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                        {{-- Stock Maximo  --}}
                                        <label for="stock_maximo">Stock Maximo </label>
                                        <input style="text-align: center" type="number" class="form-control bg-light" value="{{ $producto->stock_maximo }}"  name="stock_maximo" id="stock_maximo" disabled>
                                    </div>
                                </div>
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                        {{-- Unidad Medida  --}}
                                        <label for="unidad_medida">Unidad Medida </label>
                                        <input style="text-align: center" type="text" class="form-control bg-light" value="{{ $producto->unidad_medida }}"  name="unidad_medida" id="unidad_medida" disabled>
                                    </div>
                                </div>
                                <div class="col col-6 col-md-4">
                                    <div class="form-group">
                                            {{-- Estado un checkbox --}}
                                        <label for="estado">Estado</label><br>
                                        <span 
                                            class="badge {{ $producto->estado ? 'badge-success' : 'badge-danger' }}"
                                            disabled
                                        >
                                            {{ $producto->estado ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 col-md-5 col-lg-3">
                            <div class="form-group">
                                {{-- Imagen del Producto  --}}
                                <label for="imagen">Imagen del Producto </label>
                                <img src="{{ asset('storage/'. $producto->imagen ) }}" alt="{{ $producto->nombre }}" class="img-fluid rounded" style="max-width: 100%;">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6 mb-2">
                            <a href="{{ url('/admin/productos') }}" class="btn btn-outline-secondary btn-block">
                                <i class="fas fa-arrow-left mr-1"></i> Volver
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