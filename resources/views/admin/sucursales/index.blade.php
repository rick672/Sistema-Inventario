@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark">Listado de Sucursales</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/sucursales') }}">Sucursales</a>
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
                    <h3 class="card-title mb-0"><b>Sucursales registradas</b></h3>

                    <div class="card-tools position-absolute" style="right: 1rem;">
                        <a href="{{ url('/admin/sucursales/create') }}" class="btn bg-gradient-success">
                            <i class="fas fa-plus"></i> Nueva Sucursal
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable" class="table table-striped table-hover table-sm" style="padding-top: 15px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sucursales as $sucursal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sucursal->nombre }}</td>
                                    <td>{{ $sucursal->direccion }}</td>
                                    <td>{{ $sucursal->telefono }}</td>
                                    <td class="text-center">
                                        <span class="d-none">{{ $sucursal->activo }}</span>
                                        @if ($sucursal->activo == '1')
                                            <i class="bi bi-check-circle-fill text-success" style="font-size:1.3rem;"></i>
                                        @else
                                            <i class="bi bi-x-circle-fill text-danger" style="font-size:1.3rem;"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a 
                                            href="{{ url('/admin/sucursales/' . $sucursal->id) }}" class="btn btn-info"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a 
                                            href="{{ url('/admin/sucursales/' . $sucursal->id . '/edit') }}" class="btn btn-warning"
                                        >
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ url('/admin/sucursales/' . $sucursal->id ) }}" method="POST" id="miformulario{{ $sucursal->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger"
                                                onclick="preguntar{{ $sucursal->id }}(event)"
                                            >
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <script>
                                                function preguntar{{ $sucursal->id }}(e) {
                                                    e.preventDefault();
                                                    Swal.fire({
                                                    title: "¿Desea eliminar este registro?",
                                                    text: "Esta acción no se puede deshacer.",
                                                    icon: "question",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Si, eliminar!",
                                                    cancelButtonText: "No, no eliminar",
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miformulario{{ $sucursal->id }}').submit();
                                                    }
                                                    });
                                                }
                                            </script>
                                        </form>
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
            font-family: 'Inter', sans-serif;
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