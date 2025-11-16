@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Editar Categoría</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/categorias') }}">Categorías</a>
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
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-edit mr-2"></i> <b>Editar registro</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{ url('/admin/categoria/'. $categoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $categoria->nombre }}" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la categoría" required>
                            @error('nombre')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese una descripción (opcional)">{{ $categoria->descripcion }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 mb-2">
                                <a href="{{ url('/admin/categorias') }}" class="btn bg-gradient-secondary btn-block">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                            </div>
                            <div class="col-12 col-sm-6">
                                <button type="submit" class="btn bg-gradient-success btn-block">
                                    <i class="fas fa-check"></i> Actualizar
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