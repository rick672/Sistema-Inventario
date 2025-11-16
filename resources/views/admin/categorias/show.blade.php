@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Ver Categoría</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/categorias') }}">Categorías</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Ver</li>
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
                        <i class="fas fa-info-circle mr-2"></i> <b>Detalles de la Categoría</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light" value="{{ $categoria->nombre }}" id="nombre" name="nombre" readonly>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control bg-light" id="descripcion" name="descripcion" rows="3" readonly>{{ $categoria->descripcion }}</textarea>
                    </div>

                    <div class="form-group text-right mt-4">
                        <a href="{{ url('/admin/categorias') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Volver
                        </a>
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