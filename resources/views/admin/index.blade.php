@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Admin.</p>
    <hr>
    <div class="row">
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
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <a href="{{ url('/admin/categorias') }}">
                <span class="info-box-icon">
                <img src="{{ url('/img/folders.gif') }}" alt="" class="rounded">
                </span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text">Categorias</span>
                <span class="info-box-number"><h2 class="font-weight-bold">{{ $total_categorias }}</h2></span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
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