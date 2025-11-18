@extends('adminlte::page')

@section('title', 'Sucursales - Inventario')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0 text-dark">Sucursales</h1>
        <span class="badge bg-primary">
            <i class="fas fa-store mr-1"></i>{{ $sucursales->count() }} Sucursales
        </span>
    </div>
@stop

@section('content')
    <div class="row">
        @foreach ($sucursales as $sucursal)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card card-widget widget-user">
                <div class="widget-user-header bg-primary">
                    <h3 class="widget-user-username">{{ $sucursal->nombre }}</h3>
                    <h5 class="widget-user-desc">Sucursal</h5>
                </div>
                <div class="widget-user-image">
                    <i class="fas fa-store fa-3x bg-primary"></i>
                </div>
                <div class="card-footer p-0">
                    <div class="card-centro text-center">
                        <div class="description-header display-4 font-weight-bold text-primary">
                            {{ $sucursal->total_inventario }}
                        </div>
                        <div class="description-text h6 text-muted">
                            Productos
                        </div>
                    </div>
                </div>
                <div class="card-footer pt-0">
                    <a href="{{ url('/admin/inventario/inventario_por_sucursal/sucursal/'.$sucursal->id) }}" 
                       class="btn btn-outline-primary btn-block">
                        <i class="fas fa-eye mr-1"></i>Ver Inventario
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($sucursales->isEmpty())
    <div class="card card-widget widget-user">
        <div class="widget-user-header bg-light">
            <h3 class="widget-user-username text-dark">No hay sucursales</h3>
            <h5 class="widget-user-desc">Comienza agregando tu primera sucursal</h5>
        </div>
        <div class="widget-user-image">
            <i class="fas fa-store fa-3x text-muted"></i>
        </div>
        <div class="card-footer bg-white text-center">
            <a href="{{ url('/admin/sucursales/create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i>Agregar Sucursal
            </a>
        </div>
    </div>
    @endif
@stop

@section('css')
<style>
    .card-centro{
        padding: 40px 0 15px 0px;
    }
    .widget-user-image {
        position: absolute;
        top: 65px;
        left: 50%;
        margin-left: -45px;
    }

    .widget-user-image i {
        width: 90px;
        height: 90px;
        border: 3px solid #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #007bff;
        color: white;
    }

    .widget-user-header {
        height: 120px;
        padding: 1rem;
        text-align: center;
        background: linear-gradient(180deg, #0061FF, #60EFFF) !important;
    }

    .widget-user-username,
    .widget-user-desc {
        text-align: center !important;
        margin: 0;
        color: white;
    }

    .widget-user-username {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .widget-user-desc {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .description-header {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .description-text {
        font-size: 1rem;
        font-weight: 600;
        color: #6c757d;
        letter-spacing: 0.5px;
    }

    .display-4 {
        font-size: 3rem;
    }

    .btn-outline-primary {
        border-width: 2px;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
</style>
@stop