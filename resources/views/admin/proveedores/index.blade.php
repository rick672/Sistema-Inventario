@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-0">
        <h1 class="m-0 text-dark">Listado de Proveedores</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/productos') }}">Proveedores</a>
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
                    <h3 class="card-title mb-0"><b>Proveedores registrados</b></h3>

                    <div 
                        class="card-tools position-absolute" 
                        style="right: 1rem;"
                    >
                        <!-- Modal para crear un nuevo proveedor -->
                        <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#ModalCreate">
                            <i class="fas fa-plus"></i> Nuevo Proveedor
                        </button>

                        <!-- Modal -->
                        <div 
                            class="modal fade" 
                            id="ModalCreate" 
                            tabindex="-1" 
                            aria-labelledby="exampleModalLabel" 
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-gradient-success">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Proveedor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <form action="{{ url('/admin/proveedor/create') }}" method="POST">
                                                @csrf
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {{-- Empresa --}}
                                                            <label for="empresa">Empresa <span class="text-danger">*</span></label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                                </div>
                                                                <input type="text" value="{{ old('empresa') }}" class="form-control" id="empresa" name="empresa" placeholder="Ingrese el nombre de la empresa" required>
                                                            </div>
                                                            @error('empresa')
                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {{-- Dirección --}}
                                                            <label for="direccion">Dirección <span class="text-danger">*</span></label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                                </div>
                                                                <input type="text" value="{{ old('direccion') }}" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección de la empresa" required>
                                                            </div>
                                                            @error('direccion')
                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col col-12 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            {{-- Nombre --}}
                                                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                </div>
                                                                <input type="text" value="{{ old('nombre') }}" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del proveedor" required>
                                                            </div>
                                                            @error('nombre')
                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col col-12 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            {{-- Telefono --}}
                                                            <label for="telefono">Telefono <span class="text-danger">*</span></label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                                </div>
                                                                <input type="text" value="{{ old('telefono') }}" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono del proveedor" required>
                                                            </div>
                                                            @error('telefono')
                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col col-12 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            {{-- Telefono --}}
                                                            <label for="email">Email </label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                                </div>
                                                                <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Ingrese el email del proveedor" required>
                                                            </div>
                                                            @error('email')
                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-2">
                                                        <button type="button" class="btn bg-secondary btn-block" data-dismiss="modal">
                                                            <i class="fas fa-times"></i> Cerrar
                                                        </button>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <button type="submit" class="btn bg-success btn-block">
                                                            <i class="fas fa-save"></i> Guardar
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="dataTable" class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Empresa</th>
                                <th>Dirección</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedors as $proveedor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $proveedor->empresa }}</td>
                                    <td>{{ $proveedor->direccion }}</td>
                                    <td>{{ $proveedor->nombre }}</td>
                                    <td>{{ $proveedor->telefono }}</td>
                                    <td>{{ $proveedor->email }}</td>
                                    <td>
                                        {{-- Modal para ver detalle del proveedor --}}

                                        <button type="button" class="btn bg-gradient-info" data-toggle="modal" data-target="#ModalShow{{ $proveedor->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div 
                                            class="modal fade" 
                                            id="ModalShow{{ $proveedor->id }}" 
                                            tabindex="-1" 
                                            aria-labelledby="exampleModalLabel" 
                                            aria-hidden="true"
                                        >
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-gradient-secondary">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detalle Proveedor</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">    
                                                            <div class="row">
                                                                <div class="col col-12 col-lg-4">
                                                                    <div class="form-group">
                                                                        {{-- Empresa --}}
                                                                        <label for="empresa">Empresa </label>
                                                                        <p>{{ $proveedor->empresa }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col col-12 col-lg-8">
                                                                    <div class="form-group">
                                                                        {{-- Dirección --}}
                                                                        <label for="direccion">Dirección </label>
                                                                        <p>{{ $proveedor->direccion }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group">
                                                                        {{-- Nombre --}}
                                                                        <label for="nombre">Nombre </label>
                                                                        <p>{{ $proveedor->nombre }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group">
                                                                        {{-- Telefono --}}
                                                                        <label for="telefono">Telefono </label>
                                                                        <p>{{ $proveedor->telefono }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group">
                                                                        {{-- Telefono --}}
                                                                        <label for="email">Email </label>
                                                                        <p>{{ $proveedor->email }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row justify-end">
                                                                <div class="col-12 mb-2">
                                                                    <button type="button" class="btn bg-secondary btn-block" data-dismiss="modal">
                                                                        <i class="fas fa-times"></i> Cerrar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal para editar un proveedor -->
                                        <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#ModalEdit{{ $proveedor->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div 
                                            class="modal fade" 
                                            id="ModalEdit{{ $proveedor->id }}" 
                                            tabindex="-1" 
                                            aria-labelledby="exampleModalLabel" 
                                            aria-hidden="true"
                                        >
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-gradient-primary">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <form action="{{ url('/admin/proveedor/'. $proveedor->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            {{-- Empresa --}}
                                                                            <label for="empresa">Empresa <span class="text-danger">*</span></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                                                </div>
                                                                                <input type="text" value="{{ old('empresa', $proveedor->empresa) }}" class="form-control" id="empresa" name="empresa" placeholder="Ingrese el nombre de la empresa" required>
                                                                            </div>
                                                                            @error('empresa')
                                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            {{-- Dirección --}}
                                                                            <label for="direccion">Dirección <span class="text-danger">*</span></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                                                </div>
                                                                                <input type="text" value="{{ old('direccion', $proveedor->direccion) }}" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección de la empresa" required>
                                                                            </div>
                                                                            @error('direccion')
                                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            {{-- Nombre --}}
                                                                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                                </div>
                                                                                <input type="text" value="{{ old('nombre', $proveedor->nombre) }}" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del proveedor" required>
                                                                            </div>
                                                                            @error('nombre')
                                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            {{-- Telefono --}}
                                                                            <label for="telefono">Telefono <span class="text-danger">*</span></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                                                </div>
                                                                                <input type="text" value="{{ old('telefono', $proveedor->telefono) }}" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono del proveedor" required>
                                                                            </div>
                                                                            @error('telefono')
                                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            {{-- Telefono --}}
                                                                            <label for="email">Email </label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                                                </div>
                                                                                <input type="email" value="{{ old('email', $proveedor->email) }}" class="form-control" id="email" name="email" placeholder="Ingrese el email del proveedor" required>
                                                                            </div>
                                                                            @error('email')
                                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6 mb-2">
                                                                        <button type="button" class="btn bg-secondary btn-block" style="font-size: 15px" data-dismiss="modal">
                                                                            <i class="fas fa-times"></i> Cerrar
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <button type="submit" class="btn bg-success btn-block" style="font-size: 15px">
                                                                            <i class="fas fa-pencil-alt"></i> Actualizar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal para eliminar un proveedor --}}
                                        <form 
                                            action="{{ url('/admin/proveedor/' . $proveedor->id ) }}" 
                                            method="POST" id="miformulario{{ $proveedor->id }}" 
                                            class="d-inline"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger"
                                                onclick="preguntar{{ $proveedor->id }}(event)"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <script>
                                                function preguntar{{ $proveedor->id }}(e) {
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
                                                        document.getElementById('miformulario{{ $proveedor->id }}').submit();
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
    @if( $errors->any() )
        <script>
            @if (session('modal_id'))
                let modalID = "{{ session('modal_id') }}";
                $('#ModalEdit' + modalID).modal('show');
            @else
                $('#ModalCreate').modal('show');
            @endif
        </script>
    @endif
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