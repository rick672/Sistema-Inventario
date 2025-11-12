@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Completar la compra</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/compras') }}">Compras</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Continuar</li>
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
                        <i class="fas fa-shopping-cart mr-2"></i> <b>Paso 1 | Compra creada</b>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group">
                                {{-- Proveedor --}}
                                <label for="proveedor_id">Proveedor</label>
                                <p>{{ $compra->proveedor->nombre }}</p>
                            </div>
                        </div>
                        <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group">
                                {{-- Fecha de Compra --}}
                                <label for="fecha">Fecha Compra</label>
                                <p>{{ $compra->fecha }}</p>
                            </div>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-2">
                            <div class="form-group">
                                {{-- Estado --}}
                                <label for="estado">Estado Compra</label>
                                <p>{{ $compra->estado }}</p>
                            </div>
                        </div>
                        <div class="col col-12 col-lg-6">
                            <div class="form-group">
                                {{-- Observaciones --}}
                                <label for="observaciones">Observaciones</label>
                                <p>{{ $compra->observaciones }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-info">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-box mr-2"></i> <b>Paso 2 | Agregar productos</b>
                    </h3>
                </div>
                <div class="card-body">
                    <livewire:admin.compras.items-compra :compra="$compra" />
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 35.67px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 35.67px !important;
        }
        .input-group .select2-container {
            width: calc(100% - 45px) !important;
            /* width: calc(100% - 38px) !important;  */
        }
    </style>
    @livewireStyles
@stop

@section('js')
    {{-- <script>
        $('.select2').select2();
    </script> --}}
    @livewireScripts
@stop