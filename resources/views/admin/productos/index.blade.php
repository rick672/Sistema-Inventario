@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-0">
        <h1 class="m-0 text-dark">Listado de Productos</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/productos') }}">Productos</a>
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
                    <h3 class="card-title mb-0"><b>Productos</b></h3>

                    <div class="card-tools position-absolute" style="right: 1rem;">
                    <a href="{{ url('/admin/productos/create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nuevo Producto
                    </a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="dataTable" class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoria</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                {{-- <th>Precio Compra</th> --}}
                                <th>Precio Venta</th>
                                <th>Stock Mínimo</th>
                                {{-- <th>Stock Máximo</th> --}}
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{!! $producto->descripcion !!}</td>
                                    <td class="text-center align-middle">
                                        <img 
                                            src="{{ asset('storage/' . $producto->imagen) }}"
                                            alt="{{ $producto->nombre }}" 
                                            class="img-fluid rounded-lg"
                                            style="width: 125px; height: 125px; object-fit: cover;"
                                        >
                                    </td>
                                    {{-- <td>{{ $producto->precio_compra }}</td> --}}
                                    <td>{{ $producto->precio_venta }}</td>
                                    <td>{{ $producto->stock_minimo }}</td>
                                    {{-- <td>{{ $producto->stock_maximo }}</td> --}}
                                    <td>
                                        @if ($producto->estado=='1')
                                            <span class="badge bg-success">Activo</span>
                                        @else
                                            <span class="badge bg-danger">Inactivo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a 
                                            href="{{ url('/admin/productos/' . $producto->id) }}" class="btn btn-info"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a 
                                            href="{{ url('/admin/productos/' . $producto->id . '/edit') }}" class="btn btn-primary"
                                        >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ url('/admin/productos/' . $producto->id ) }}" method="POST" id="miformulario{{ $producto->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger"
                                                onclick="preguntar{{ $producto->id }}(event)"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <script>
                                                function preguntar{{ $producto->id }}(e) {
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
                                                        document.getElementById('miformulario{{ $producto->id }}').submit();
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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