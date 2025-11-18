@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Continuar Compra</h1>
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
                <div class="card-header bg-gradient-info d-flex align-items-center">

                    <!-- Izquierda -->
                    <h3 class="card-title text-white m-0 d-flex align-items-center">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        <b>Paso 1 | Compra creada</b>
                    </h3>

                    <!-- Derecha: ml-auto empuja el badge hacia la derecha -->
                    <span class="badge badge-{{
                        $compra->estado === 'Pendiente' ? 'warning' :
                        ($compra->estado === 'Recibido' ? 'success' :
                        ($compra->estado === 'Enviado al Proveedor' ? 'danger' : 'secondary'))
                    }} px-3 py-2 ml-auto">
                        <p style="font-size: 15px; margin:0">
                            {{ $compra->estado }}
                        </p>
                    </span>

                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col col-12 col-sm-6 col-md-3 col-lg-2">
                            <div class="form-group">
                                {{-- Proveedor --}}
                                <label for="proveedor_id">Proveedor</label>
                                <p>{{ $compra->proveedor->nombre }}</p>
                            </div>
                        </div>
                        <div class="col col-12 col-sm-6 col-md-3 col-lg-2">
                            <div class="form-group">
                                {{-- Fecha de Compra --}}
                                <label for="fecha">Fecha Compra</label>
                                <p>{{ $compra->fecha }}</p>
                            </div>
                        </div>
                        <div class="col col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                {{-- Observaciones --}}
                                <label for="observaciones">Observaciones</label>
                                <p>{{ $compra->observaciones }}</p>
                            </div>
                        </div>
                        <div class="col col-12 col-sm-6 col-md-3 col-lg-2">
                            <div class="form-group">
                                {{-- Sucursal  --}}
                                <label for="observaciones">Sucursal </label>
                                <p>{{ $sucursal_destino?->nombre ?? 'Sin sucursal' }}</p>
                            </div>
                        </div>
                        @if($compra->total > 0)
                            <div class="col col-12 col-sm-6 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label for="observaciones">Total de Compra</label>
                                    <p class="mb-1 h4 text-primary font-weight-bold">
                                        Bs. {{ number_format($compra->total, 2) }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Paso 2 | Agregar productos --}}
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-info">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-box mr-2"></i> <b>Paso 2 | Agregar productos</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <livewire:admin.compras.items-compra :compra="$compra" />
                </div>
            </div>
        </div>
    </div>
    {{-- Paso 3 | Finalizar compra --}}
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-info">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-box mr-2"></i> <b>Paso 3 | Finalizar compra</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{ route('compras.finalizarCompra', $compra) }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col col-12 col-md-4">
                                <div class="form-group">
                                    {{-- Sucursal --}}
                                    <label for="sucursal_id">Sucursal <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                        </div>
                                        <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                                            <option value="">Seleccione una opción</option>
                                            @foreach($sucursales as $sucursal)
                                                <option value="{{ $sucursal->id }}" {{ old('sucursal_id') == $sucursal->id ? 'selected' : '' }}>
                                                    {{ $sucursal->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('sucursal_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Botones Enviar Correo y Finalizar --}}
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <a 
                                        href="{{ route('compras.enviarCorreo', $compra) }}" 
                                        class="btn bg-gradient-primary btn-block"
                                    >
                                        <i class="fas fa-envelope"></i> Enviar al proveedor
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <button class="btn bg-gradient-success btn-block" type="submit">
                                        <i class="fas fa-check"></i> Finalizar compra
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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