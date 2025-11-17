@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- TU DISEÑO PERSONALIZADO --}}
    <div class="header-actions">
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
                <a class="dropdown-item" href="#" data-toggle="control-sidebar">
                    <i class="fas fa-cog mr-2"></i>Configuración
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

</nav>

<style>
.header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-left: auto;
}

.date-display {
    color: #5c6166;
    font-size: 0.9rem;
}

.navbar .header-actions .btn-group .dropdown-toggle {
    border: 1px solid #dee2e6;
    background: white;
}

.navbar .header-actions .btn-group .dropdown-menu {
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}
</style>

<script>
$(document).ready(function() {
    // Actualizar fecha actual
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('current-date').textContent = now.toLocaleDateString('es-ES', options);
});
</script>