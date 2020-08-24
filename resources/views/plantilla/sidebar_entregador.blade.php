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
                <a class="nav-link" href="{{url('admin/entrega')}}" onclick="event.preventDefault(); document.getElementById('entrega-form').submit();"><i class="fa fa-tasks"></i> Entrega</a>
                <form id="entrega-form" action="{{url('admin/entrega')}}" method="GET" style="display: none">
                    {{csrf_field()}}
                </form>
            </li>

            

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>