@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Registro de Compras</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/compras') }}">Compras</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Registrar</li>
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
                        <i class="fas fa-plus-circle mr-2"></i> <b>Nuevo registro</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{ url('/admin/compras/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col col-12 col-md-4">
                                <div class="form-group">
                                    {{-- Proveedor --}}
                                    <label for="proveedor_id">Proveedor <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                        </div>
                                        <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                                            <option value="">Seleccione una opción</option>
                                            @foreach($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                                    {{ $proveedor->nombre ." | ". $proveedor->empresa  }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('proveedor_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-12 col-md-3">
                                <div class="form-group">
                                    {{-- Categoria --}}
                                    <label for="fecha">Fecha de Compra <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="date" value="{{ old('fecha') }}" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha de la compra" required>
                                    </div>
                                    @error('fecha')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-12 col-md-5">
                                <div class="form-group">
                                    {{-- Categoria --}}
                                    <label for="observaciones">Observaciones</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('observaciones') }}" class="form-control" id="observaciones" name="observaciones" placeholder="Ingrese las observaciones" required>
                                    </div>
                                    @error('observaciones')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 mb-2">
                                <a href="{{ url('/admin/compras') }}" class="btn bg-secondary btn-block">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                            </div>
                            <div class="col-12 col-sm-6">
                                <button type="submit" class="btn bg-success btn-block">
                                    <i class="fas fa-save"></i> Continuar Compra
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