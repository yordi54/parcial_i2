<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <a class="nav-link" href="{{url('admin')}}" onclick="event.preventDefault(); document.getElementById('home-form').submit();"><i class="fa fa-list"></i> Inicio</a>

            <form id="home-form" action="{{url('admin')}}" method="GET" style="display: none;">
                {{csrf_field()}}
            </form>
            </li>
            <li class="nav-title">
                Menú
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/categoria')}}" onclick="event.preventDefault(); document.getElementById('categoria-form').submit();"><i class="fa fa-list"></i> Categorías</a>
                <form id="categoria-form" action="{{url('admin/categoria')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/producto')}}" onclick="event.preventDefault(); document.getElementById('producto-form').submit();"><i class="fa fa-tasks"></i> Productos</a>
                <form id="producto-form" action="{{url('admin/producto')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/pedido')}}" onclick="event.preventDefault(); document.getElementById('pedido-form').submit();"><i class="fa fa-tasks"></i> Pedidos</a>
                <form id="pedido-form" action="{{url('admin/pedido')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>

           

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/venta')}}" onclick="event.preventDefault(); document.getElementById('venta-form').submit();"><i class="fa fa-tasks"></i> Venta</a>
                <form id="venta-form" action="{{url('admin/venta')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/pago')}}" onclick="event.preventDefault(); document.getElementById('pago-form').submit();"><i class="fa fa-tasks"></i> Pago</a>
                <form id="pago-form" action="{{url('admin/pago')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>

            

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/cliente')}}" onclick="event.preventDefault(); document.getElementById('cliente-form').submit();"><i class="fa fa-tasks"></i> Clientes</a>
                <form id="cliente-form" action="{{url('admin/cliente')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>


            

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/rol')}}" onclick="event.preventDefault(); document.getElementById('rol-form').submit();"><i class="fa fa-tasks"></i> Roles</a>
                <form id="rol-form" action="{{url('admin/rol')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>


        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>