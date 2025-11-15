@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-0">
        <h1 class="m-0 text-dark">Inventario de Sucursales por Lotes</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/sucursales_por_lotes') }}">Sucursales por Lotes</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Listado</li>
            </ol>
        </nav>
    </div>
@stop


@section('content')
    <div class="row">
        @foreach ($sucursales as $sucursal)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <a href="{{ url('/admin/inventario/inventario_por_sucursal/sucursal/'.$sucursal->id) }}">
                        <span class="info-box-icon">
                        <img src="{{ url('/img/supermarket.gif') }}" alt="" class="rounded">
                        </span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">Sucursal {{ $sucursal->nombre }}</span>
                        <span class="info-box-number"><h2 class="font-weight-bold">{{ $sucursal->total_inventario }} Productos </h2></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')

@stop

@section('js')

@stop