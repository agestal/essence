<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Essence</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item"><a href="#" class="nav-link"><p>Categorias<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="{{ url('admin/categorias') }}" class="nav-link"><p>Lista</p></a></li>
                    <li class="nav-item"><a href="{{ url('admin/categorias/create') }}" class="nav-link"><p>Nueva</p></a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="#" class="nav-link"><p>Servicios<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="{{ url('admin/servicios') }}" class="nav-link"><p>Lista</p></a></li>
                    <li class="nav-item"><a href="{{ url('admin/servicios/create') }}" class="nav-link"><p>Nuevo</p></a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="#" class="nav-link"><p>Clientes<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="{{ url('admin/clientes') }}" class="nav-link"><p>Lista</p></a></li>
                    <li class="nav-item"><a href="{{ url('admin/clientes/create') }}" class="nav-link"><p>Nuevo</p></a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="#" class="nav-link"><p>Ventas<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="{{ url('admin/ventas') }}" class="nav-link"><p>Lista</p></a></li>
                    <li class="nav-item"><a href="{{ url('admin/ventas/create') }}" class="nav-link"><p>Nueva</p></a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="#" class="nav-link"><p>Veces<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="{{ url('admin/veces/pendientes') }}" class="nav-link"><p>Lista</p></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><p>Insertar vez</p></a></li>
                </ul>
            </li>

        </ul>
      </nav>
    </div>
  </aside>
