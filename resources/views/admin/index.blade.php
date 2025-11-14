@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Admin.</p>
    <hr>
    <div class="row">
        {{-- Card de sucursales --}}
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
                <a href="{{ url('/admin/sucursales') }}">
                    <span class="info-box-icon">
                    <img src="{{ url('/img/building.gif') }}" alt="" class="rounded">
                    </span>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Sucursales</span>
                    <span class="info-box-number"><h2 class="font-weight-bold">{{ $total_sucursales }}</h2></span>
                </div>
            </div>
        </div>
        {{-- Card de categorias --}}
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('/admin/categorias') }}">
                    <span class="info-box-icon">
                    <img src="{{ url('/img/boxes.gif') }}" alt="" class="rounded">
                    </span>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number"><h2 class="font-weight-bold">{{ $total_categorias }}</h2></span>
                </div>
            </div>
        </div>
        {{-- Card de productos --}}
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('/admin/productos') }}">
                    <span class="info-box-icon">
                    <img src="{{ url('/img/tag.gif') }}" alt="" class="rounded">
                    </span>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Productos</span>
                    <span class="info-box-number"><h2 class="font-weight-bold">{{ $total_productos }}</h2></span>
                </div>
            </div>
        </div>
        {{-- Card de proveedores --}}
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('/admin/proveedores') }}">
                    <span class="info-box-icon">
                    <img src="{{ url('/img/delivery-truck.gif') }}" alt="" class="rounded">
                    </span>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Proveedores</span>
                    <span class="info-box-number"><h2 class="font-weight-bold">{{ $total_proveedores }}</h2></span>
                </div>
            </div>
        </div>
        {{-- Card de compras --}}
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ url('/admin/compras') }}">
                    <span class="info-box-icon">
                    <img src="{{ url('/img/grocery.gif') }}" alt="" class="rounded">
                    </span>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Compras</span>
                    <span class="info-box-number"><h2 class="font-weight-bold">{{ $total_compras }}</h2></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-info">
            <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop