<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>Proyecto</title>
    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--PONER LOGO-->
        <!--<a class="navbar-brand" href="#"></a>-->
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Dashbord</a>
            </li>

        </ul>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                    <img src="{{route('usuario.show',['filename'=> Auth::user()->foto]) }}" id="imagen1" alt="{{ Auth::user()->name }}" class="img-avatar" />

                    <span class="d-md-down-none">{{ Auth::user()->name }} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>




            </li>
        </ul>
    </header>

    <div class="app-body">

        @if(Auth::check())
        @if (Auth::user()->role_id == 1)
        @include('plantilla.sidebar_administrador')
        @elseif (Auth::user()->role_id == 2)
        @include('plantilla.sidebar_entregador')
        @elseif (Auth::user()->role_id == 4)
        @include('plantilla.sidebar_empleado')
        @else

        @endif

        @endif

        <!-- Contenido Principal -->

        @yield('contenido')

        <!-- /Fin del contenido principal -->
    </div>

    <footer class="app-footer">
        <span><a href="#">Parcial de SI2</a> &copy; 2020</span>
        <span class="ml-auto">Desarrollado por <a href="#">Yordi Condori Escalera</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>

    <!--JQUERY-->
    <script>
        /*EDITAR CATEGORIA EN VENTA MODALEDIT */
        $('#abrirmodalEditar').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget) //devuelve qué elemento se ingresa o sale del movimiento del mouse. 
            var nombre_modal_editar = button.data('nombre')
            var descripcion_modal_editar = button.data('descripcion')
            var id_categoria = button.data('id_categoria')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
            modal.find('.modal-body #id_categoria').val(id_categoria);
        })
        /*FIN ventana modal para editar la categoria*/




        /*CAMBIAR ESTADO  PARA CATEGORIA*/
        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var id_categoria = button.data('id_categoria')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)

            modal.find('.modal-body #id_categoria').val(id_categoria);
        })


        /*FIN ventana modal para cambiar estado de la CATEGORIA*/

        /*EDITAR PRODUCTO EN VENTANA MODAL*/
        $('#abrirmodalEditar').on('show.bs.modal', function(event) {

            //console.log('modal abierto');
            /*el button.data es lo que está en el button de editar*/
            var button = $(event.relatedTarget)
            /*este id_categoria_modal_editar selecciona la categoria*/
            var id_categoria_modal_editar = button.data('id_categoria')
            var nombre_modal_editar = button.data('nombre')
            var descripcion_modal_editar = button.data('descripcion')
            var precio_venta_modal_editar = button.data('precio')
            var stock_modal_editar = button.data('stock')
            //var imagen_modal_editar = button.data('imagen1')
            var id_producto = button.data('id_producto')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            /*los # son los id que se encuentran en el formulario*/
            modal.find('.modal-body #id').val(id_categoria_modal_editar);
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #precio').val(precio_venta_modal_editar);
            modal.find('.modal-body #stock').val(stock_modal_editar);
            modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
            // modal.find('.modal-body #subirImagen').html("<img src="img/producto/imagen_modal_editar">");
            modal.find('.modal-body #id_producto').val(id_producto);
        })





        /*AGREGAR STOCK EN VENTANA MODAL*/
        $('#abrirmodalAgregarStock').on('show.bs.modal', function(event) {

            //console.log('modal abierto');
            /*el button.data es lo que está en el button de editar*/
            var button = $(event.relatedTarget)
            /*este id_categoria_modal_editar selecciona la categoria*/
            var id_categoria_modal_editar = button.data('id_categoria')
            var nombre_modal_editar = button.data('nombre')
            var precio_venta_modal_editar = button.data('precio')
            //var stock_modal_editar = button.data('stock')
            //var imagen_modal_editar = button.data('imagen1')
            var id_producto = button.data('id_producto')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            /*los # son los id que se encuentran en el formulario*/
            modal.find('.modal-body #id').val(id_categoria_modal_editar);
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #precio').val(precio_venta_modal_editar);
            //modal.find('.modal-body #stock').val(stock_modal_editar);
            // modal.find('.modal-body #subirImagen').html("<img src="img/producto/imagen_modal_editar">");
            modal.find('.modal-body #id_producto').val(id_producto);
        })



        /*CAMBIAR ESTADO  PARA PRODUCTO*/
        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var id_producto = button.data('id_producto')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)

            modal.find('.modal-body #id_producto').val(id_producto);
        })

        /*FIN ventana modal para cambiar estado de la CATEGORIA*/



        /*CAMBIAR ESTADO  PARA PAGOS*/
        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var id_pago = button.data('id_pago')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)

            modal.find('.modal-body #id_pago').val(id_pago);
        })





        /*CAMBIAR ESTADO  PARA ENTREGA*/
        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget)
            var id_entrega = button.data('id_entrega')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)

            modal.find('.modal-body #id_entrega').val(id_entrega);
        })
    </script>
</body>

</html>