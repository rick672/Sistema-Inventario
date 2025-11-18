@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-0">
        <h1 class="m-0 text-dark">Listado de Lotes</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/lotes') }}">Lotes</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Listado</li>
            </ol>
        </nav>
    </div>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title mb-0"><b>Filtrado de datos</b></h3>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{ url('/admin/lotes') }}" method="GET">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">Desde</label>
                                    <input type="date" class="form-control" name="fecha_desde">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">Hasta</label>
                                    <input type="date" class="form-control" name="fecha_hasta">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 d-flex align-items-end">
                                <div class="form-group">
                                    <button 
                                        type="date"
                                        class="btn btn-primary">
                                        <i class="fas fa-search"></i> Filtrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title mb-0"><b>Lotes registrados</b></h3>
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable" class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo Lote</th>
                                <th>Producto</th>
                                <th>Proveedor</th>
                                <th>Fecha de Entrada</th>
                                <th>Fecha de Vencimiento</th>
                                <th class="text-center">Dias restantes</th>
                                <th class="text-center">Cantidad Actual</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lotes as $lote)
                                <tr class="{{ $lote->is_expired ? 'table-danger' : ''  }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lote->codigo_lote }}</td>
                                    <td>{{ $lote->producto->nombre }}</td>
                                    <td>{{ $lote->proveedor->nombre }}</td>
                                    <td>{{ $lote->fecha_entrada }}</td>
                                    <td>{{ $lote->fecha_vencimiento }}</td>
                                    <td class="text-center">{{ $lote->days_to_expire }} Dias</td>
                                    <td class="text-center">{{ $lote->cantidad_actual }}</td>
                                    <td class="text-center">
                                        @if($lote->is_expired)
                                            <span class="badge badge-danger">Vencido</span>

                                        @elseif($lote->days_to_expire <= 20)
                                            <span class="badge badge-warning">Por caducar</span>
                                        @else
                                            <span class="badge badge-success">Vigente</span>
                                        @endif
                                    </td>
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
        <style>
        /* Botonera en fila con "Mostrar" y "Buscar" */
        #dataTable_wrapper .dt-buttons {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-bottom: 0;
        }

        /* Estilos para los botones DataTable */
        #dataTable_wrapper .btn {
            font-size: 13px;
            padding: 5px 12px;
            border-width: 1px;
            box-shadow: none;
        }

        /* Sobrescribir btn-secondary para evitar fondo */
        #dataTable_wrapper .btn-secondary {
            background-color: transparent !important;
            border-color: #6c757d !important;
            color: #6c757d !important;
        }

        #dataTable_wrapper .btn-outline-danger {
            color: #dc3545 !important;
            border-color: #dc3545 !important;
        }

        #dataTable_wrapper .btn-outline-info {
            color: #17a2b8 !important;
            border-color: #17a2b8 !important;
        }

        #dataTable_wrapper .btn-outline-success {
            color: #28a745 !important;
            border-color: #28a745 !important;
        }

        #dataTable_wrapper .btn-outline-dark {
            color: #343a40 !important;
            border-color: #343a40 !important;
        }

        #dataTable_wrapper .btn-outline-success:hover {
            background-color: #28a745 !important;
            color: white !important;
        }

        #dataTable_wrapper .btn-outline-danger:hover {
            background-color: #dc3545 !important;
            color: white !important;
        }

        #dataTable_wrapper .btn-outline-info:hover {
            background-color: #17a2b8 !important;
            color: white !important;
        }

        #dataTable_wrapper .btn-outline-dark:hover {
            background-color: #343a40 !important;
            color: white !important;
        }

        #dataTable_wrapper .btn-outline-secondary:hover {
            background-color: #6c757d !important;
            color: white !important;
        }
    </style>
@stop

@section('js')
    <script> 
        $(function() {
            $('#dataTable').DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay datos disponibles en esta tabla",
                    "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [
                    { text: '<i class="fas fa-copy"></i> Copiar', extend: 'copy', className: 'btn btn-outline-secondary btn-sm' },
                    { text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-outline-danger btn-sm' },
                    { text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-outline-info btn-sm' },
                    { text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-outline-success btn-sm' },
                    { text: '<i class="fas fa-print"></i> Imprimir', extend: 'print', className: 'btn btn-outline-dark btn-sm text-dark' },
                ]

            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop