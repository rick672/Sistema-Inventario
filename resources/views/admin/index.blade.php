@extends('adminlte::page')

@section('title', 'Dashboard - Sistema de Inventario')

@section('content_header')
    <div class="dashboard-header">
        <h1>Dashboard <small>Sistema de Inventario</small></h1>
        {{-- <div class="header-actions">
            <span class="date-display">
                <i class="fas fa-calendar-alt"></i> 
                <span id="current-date"></span>
            </span>
            <div class="btn-group">
                <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Perfil</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Configuración</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
                </div>
            </div>
        </div> --}}
    </div>
@stop

@section('content')
    <!-- Alertas importantes -->
    @if($total_lotes_vencidos > 0)
        <div class="alert alert-warning alert-dismissible fade show modern-alert" role="alert">
            <div class="d-flex align-items-center">
                <div class="alert-icon mr-3">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                </div>
                <div class="grow">
                    <h4 class="alert-heading mb-1">¡Atención requerida!</h4>
                    <p class="mb-0">Tienes <strong>{{ $total_lotes_vencidos }}</strong> lotes vencidos o próximos a vencer. 
                    <a href="{{ url('/admin/lotes') }}" class="alert-link">Revisar ahora</a></p>
                </div>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
    @endif

    <!-- Tarjetas de métricas principales - NUEVO DISEÑO -->
    <div class="row">
        {{-- Card 1 - Sucursales --}}
        <div class="col-xl-2 col-md-4 col-sm-6 col-12 mb-4">
            <div class="metric-card primary">
                <div class="card-icon">
                    <i class="fas fa-building"></i>
                </div>
                <div class="card-content">
                    <div class="metric-value">{{ $total_sucursales }}</div>
                    <div class="metric-label">Sucursales</div>
                    <div class="metric-trend up">
                        <i class="fas fa-arrow-up"></i> 2 nuevas
                    </div>
                </div>
                <a href="{{ url('/admin/sucursales') }}" class="card-link">
                    Ver detalles <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        {{-- Card 2 - Productos --}}
        <div class="col-xl-2 col-md-4 col-sm-6 col-12 mb-4">
            <div class="metric-card success">
                <div class="card-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="card-content">
                    <div class="metric-value">{{ $total_productos }}</div>
                    <div class="metric-label">Productos</div>
                    <div class="metric-trend up">
                        <i class="fas fa-arrow-up"></i> 15 nuevos
                    </div>
                </div>
                <a href="{{ url('/admin/productos') }}" class="card-link">
                    Ver detalles <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        {{-- Card 3 - Categorias --}}
        <div class="col-xl-2 col-md-4 col-sm-6 col-12 mb-4">
            <div class="metric-card warning">
                <div class="card-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="card-content">
                    <div class="metric-value">{{ $total_categorias }}</div>
                    <div class="metric-label">Categorías</div>
                    <div class="metric-trend up">
                        <i class="fas fa-arrow-up"></i> 3 nuevas
                    </div>
                </div>
                <a href="{{ url('/admin/categorias') }}" class="card-link">
                    Ver detalles <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        {{-- Card 4 - Proveedores --}}
        <div class="col-xl-2 col-md-4 col-sm-6 col-12 mb-4">
            <div class="metric-card info">
                <div class="card-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="card-content">
                    <div class="metric-value">{{ $total_proveedores }}</div>
                    <div class="metric-label">Proveedores</div>
                    <div class="metric-trend up">
                        <i class="fas fa-arrow-up"></i> 5 nuevos
                    </div>
                </div>
                <a href="{{ url('/admin/proveedores') }}" class="card-link">
                    Ver detalles <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        {{-- Card 5 - Compras --}}
        <div class="col-xl-2 col-md-4 col-sm-6 col-12 mb-4">
            <div class="metric-card secondary">
                <div class="card-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-content">
                    <div class="metric-value">{{ $total_compras }}</div>
                    <div class="metric-label">Compras</div>
                    <div class="metric-trend up">
                        <i class="fas fa-arrow-up"></i> 12 este mes
                    </div>
                </div>
                <a href="{{ url('/admin/compras') }}" class="card-link">
                    Ver detalles <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        {{-- Card 6 - Lotes Vencidos --}}
        <div class="col-xl-2 col-md-4 col-sm-6 col-12 mb-4">
            <div class="metric-card danger">
                <div class="card-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="card-content">
                    <div class="metric-value">{{ $total_lotes_vencidos }}</div>
                    <div class="metric-label">Lotes Vencidos</div>
                    <div class="metric-trend down">
                        <i class="fas fa-exclamation-circle"></i> Atención
                    </div>
                </div>
                <a href="{{ url('/admin/lotes') }}" class="card-link">
                    Revisar <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Columna principal -->
        <div class="col-lg-8">
            <!-- Gráfico de inventario -->
            <div class="card modern-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Inventario por Categoría
                    </h3>
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                Este mes
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Esta semana</a>
                                <a class="dropdown-item" href="#">Este mes</a>
                                <a class="dropdown-item" href="#">Este trimestre</a>
                                <a class="dropdown-item" href="#">Este año</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="inventoryChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <!-- Compras recientes y acciones rápidas -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card modern-card">
                        <div class="card-header" style="display: flex">
                            <h3 class="card-title">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Compras Recientes
                            </h3>
                            <span class="badge badge-primary ml-2" style="align-content:center">{{ $total_compras }} total</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Proveedor</th>
                                            <th>Fecha</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comprasRecientes as $compra)
                                            <tr>
                                                <td>{{ $compra->proveedor->nombre }}</td>
                                                <td>{{ $compra->fecha }}</td>
                                                <td><span class="badge badge-success">${{ $compra->total }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url('/admin/compras') }}" class="btn btn-sm btn-outline-primary">
                                Ver todas las compras
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card modern-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bolt mr-2"></i>
                                Acciones Rápidas
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="quick-actions">
                                <a href="{{ url('/admin/productos/create') }}" class="quick-action-item">
                                    <div class="action-icon bg-primary">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <span>Agregar Producto</span>
                                </a>
                                
                                <a href="{{ url('/admin/compras/create') }}" class="quick-action-item">
                                    <div class="action-icon bg-success">
                                        <i class="fas fa-cart-plus"></i>
                                    </div>
                                    <span>Registrar Compra</span>
                                </a>
                                
                                <a href="{{ url('/admin/lotes') }}" class="quick-action-item">
                                    <div class="action-icon bg-warning">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <span>Ver Lotes</span>
                                </a>
                                
                                <a href="{{ url('/admin/reportes') }}" class="quick-action-item">
                                    <div class="action-icon bg-info">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <span>Generar Reporte</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Actividad reciente -->
            <div class="card modern-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-2"></i>
                        Actividad Reciente
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon bg-primary">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nuevo producto agregado</div>
                            <div class="activity-time">Hace 2 horas</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon bg-success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Compra registrada</div>
                            <div class="activity-time">Hace 5 horas</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon bg-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Stock bajo en productos</div>
                            <div class="activity-time">Hace 1 día</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon bg-info">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nuevo proveedor agregado</div>
                            <div class="activity-time">Hace 2 días</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas rápidas -->
            <div class="card modern-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-2"></i>
                        Estadísticas Rápidas
                    </h3>
                </div>
                <div class="card-body">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-value">{{ $total_compras }}</div>
                            <div class="stat-label">Compras Totales</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value text-success">85%</div>
                            <div class="stat-label">Disponibilidad</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value text-warning">12</div>
                            <div class="stat-label">Stock Bajo</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value text-info">7</div>
                            <div class="stat-label">Pedidos Hoy</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        :root {
            --primary-rgb: 67, 97, 238;
            --success: #4cc9f0;
            --warning: #f72585;
            --info: #4895ef;
            --danger: #e63946;
            --secondary: #6c757d;
            --modern-shadow: 0 4px 20px 0 rgba(0,0,0,0.1);
            --modern-shadow-hover: 0 8px 25px 0 rgba(0,0,0,0.15);
        }

        .dashboard-header {
            padding: 1.5rem 0;
            margin: -15px 0 1rem 0;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-header h1 {
            font-weight: 600;
            margin-bottom: 0;
            color: #343a40;
        }

        .dashboard-header .small {
            color: #6c757d;
            font-weight: 400;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .date-display {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .modern-alert {
            border: none;
            border-radius: 12px;
            box-shadow: var(--modern-shadow);
            border-left: 4px solid #ffc107;
            margin-bottom: 1.5rem;
        }

        .alert-icon {
            width: 50px;
            text-align: center;
        }

        .grow {
            flex-grow: 1;
        }

        /* NUEVO DISEÑO DE CARDS */
        .metric-card {
            background: linear-gradient(360deg,rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 45%, rgba(0, 0, 0, 0.062) 100%);
            border-radius: 12px;
            box-shadow: var(--modern-shadow);
            padding: 1.5rem 1rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--modern-shadow-hover);
        }

        .metric-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }

        .metric-card.primary::before { background: var(--primary); }
        .metric-card.success::before { background: var(--success); }
        .metric-card.warning::before { background: var(--warning); }
        .metric-card.info::before { background: var(--info); }
        .metric-card.danger::before { background: var(--danger); }
        .metric-card.secondary::before { background: var(--secondary); }

        .metric-card.primary:hover { border-color: var(--primary); }
        .metric-card.success:hover { border-color: var(--success); }
        .metric-card.warning:hover { border-color: var(--warning); }
        .metric-card.info:hover { border-color: var(--info); }
        .metric-card.danger:hover { border-color: var(--danger); }
        .metric-card.secondary:hover { border-color: var(--secondary); }

        .card-icon {
            margin: 0 auto 1rem;
            font-size: 2.5rem;
        }

        .metric-card.primary .card-icon { color: var(--primary); }
        .metric-card.success .card-icon { color: var(--success); }
        .metric-card.warning .card-icon { color: var(--warning); }
        .metric-card.info .card-icon { color: var(--info); }
        .metric-card.danger .card-icon { color: var(--danger); }
        .metric-card.secondary .card-icon { color: var(--secondary); }

        .metric-value {
            font-size: 2.3rem;
            font-weight: 850;
            color: #42474d;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .metric-label {
            font-size: 1rem;
            color: #6c757d;
            font-weight: 500;
            margin-bottom: 0.75rem;
        }

        .metric-trend {
            font-size: 0.80rem;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .metric-trend.up {
            background: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }

        .metric-trend.down {
            background: rgba(230, 57, 70, 0.1);
            color: var(--danger);
        }

        .card-link {
            display: block;
            text-align: center;
            color: #6c757d;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            padding-top: 0.75rem;
            border-top: 1px solid #e9ecef;
            transition: color 0.3s ease;
        }

        .metric-card.primary .card-link:hover { color: var(--primary); }
        .metric-card.success .card-link:hover { color: var(--success); }
        .metric-card.warning .card-link:hover { color: var(--warning); }
        .metric-card.info .card-link:hover { color: var(--info); }
        .metric-card.danger .card-link:hover { color: var(--danger); }
        .metric-card.secondary .card-link:hover { color: var(--secondary); }

        /* Cards modernas */
        .modern-card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--modern-shadow);
            margin-bottom: 1.5rem;
        }

        .modern-card .card-header {
            border-bottom: 1px solid rgba(0,0,0,0.05);
            background: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 1.25rem 1.5rem;
        }

        .modern-card .card-title {
            font-weight: 600;
            margin-bottom: 0;
            font-size: 1.1rem;
            color: #343a40;
        }

        .modern-card .card-body {
            padding: 1.5rem;
        }

        .chart-container {
            position: relative;
            height: 250px;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            gap: 1rem;
        }

        .quick-action-item {
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem;
            background: #f8f9fa;
            border-radius: 10px;
            text-decoration: none;
            color: #495057;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .quick-action-item:hover {
            background: white;
            color: #007bff;
            text-decoration: none;
            border-color: #007bff;
            transform: translateY(-2px);
            box-shadow: var(--modern-shadow);
        }

        .action-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-size: 1.1rem;
        }

        /* Activity Feed */
        .activity-feed {
            padding: 0;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-size: 1rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            margin-bottom: 0.25rem;
            color: #343a40;
        }

        .activity-time {
            font-size: 0.85rem;
            color: #6c757d;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .stat-item {
            text-align: center;
            padding: 1.25rem 1rem;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }

        /* Table improvements */
        .table th {
            border-top: none;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            color: #6c757d;
            background: #f8f9fa;
        }

        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Inicializar gráfico
        const ctx = document.getElementById('inventoryChart').getContext('2d');
        const inventoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Electrónicos', 'Ropa', 'Alimentos', 'Hogar', 'Deportes', 'Otros'],
                datasets: [{
                    label: 'Productos en inventario',
                    data: [65, 59, 80, 81, 56, 55],
                    backgroundColor: [
                        'rgba(67, 97, 238, 0.7)',
                        'rgba(76, 201, 240, 0.7)',
                        'rgba(247, 37, 133, 0.7)',
                        'rgba(230, 57, 70, 0.7)',
                        'rgba(58, 12, 163, 0.7)',
                        'rgba(72, 149, 239, 0.7)'
                    ],
                    borderColor: [
                        'rgba(67, 97, 238, 1)',
                        'rgba(76, 201, 240, 1)',
                        'rgba(247, 37, 133, 1)',
                        'rgba(230, 57, 70, 1)',
                        'rgba(58, 12, 163, 1)',
                        'rgba(72, 149, 239, 1)'
                    ],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Tooltips mejorados
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop