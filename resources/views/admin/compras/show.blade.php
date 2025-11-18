@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Compra Nro. {{ $compra->id }} </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/compras') }}">Compras </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Detalles</li>
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
                        <b>Detalle de Compra</b>
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
                        <div class="col col-12 col-sm-6 col-md-3 col-lg-2">
                            <div class="form-group">
                                {{-- Total de Compra  --}}
                                <label for="observaciones">Total de Compra </label>
                                <p class="mb-1 h4 text-primary font-weight-bold">
                                    Bs. {{ number_format($compra->total, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Lista de Productos --}}
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-info">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-box mr-2"></i> <b>Productos</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable" class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Imagen</th>
                                <th>Lote</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">P / U</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compra->detalleCompras as $detalle)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="font-weight-bold">{{ $detalle->producto->nombre }}</span>
                                    </td>
                                    <td>
                                        <img 
                                            src="{{ asset('storage/' . $detalle->producto->imagen) }}" 
                                            alt="{{ $detalle->producto->nombre }}" 
                                            class="rounded mr-2" 
                                            style="width: 60px; height: 60px; object-fit: cover;"
                                        >
                                    </td>
                                    <td>{{ $detalle->lote->codigo_lote }}</td>
                                    <td class="text-center">{{ $detalle->cantidad }}</td>
                                    <td class="text-center">{{ number_format($detalle->precio_unitario, 2) }} Bs</td>
                                    <td class="text-center text-success font-weight-bold">{{ number_format($detalle->subtotal, 2) }} Bs</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@stop

@section('css')

@stop

@section('js')

@stop