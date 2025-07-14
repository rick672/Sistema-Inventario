@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/categorias') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos de la Categoria</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row flex justify-content-center">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos de la Categoria</b></h3>

                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre <b>(*)</b></label>
                                <input type="text" class="form-control" value="{{ $categoria->nombre }}" id="nombre" name="nombre" placeholder="Nombre" readonly>
                                @error('nombre')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" readonly>{{ $categoria->descripcion }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop