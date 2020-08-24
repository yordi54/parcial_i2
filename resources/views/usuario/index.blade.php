@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">

                <h2>Listado de Usuarios</h2><br />

                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Usuario
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">

                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="bg-primary">

                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>CI</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Imagen</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($usuarios as $usu)
                            @if($usu->role_id != 5)
                            <tr>

                                <td>{{$usu->name}}</td>
                                <td>{{$usu->apellidos}}</td>
                                <td>{{$usu->ci}}</td>
                                <td>{{$usu->direccion}}</td>
                                <td>{{$usu->celular}}</td>
                                <td>{{$usu->email}}</td>
                                <td>{{$usu->role->nombre}}</td>
                                <td>

                                    <img src="{{route('usuario.show',['filename'=> $usu->foto]) }}" id="imagen1" alt="{{$usu->name}}" class="img-responsive" width="100px" height="100px" />

                                </td>
                                <td><button type="button" class="btn btn-success btn-md">

                                        <i class="fa fa-check fa-2x"></i> Activo
                                    </button>
                                </td>

                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{$usuarios->render()}}
                </div>


            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('usuario.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        {{csrf_field()}}

                        @include('usuario.form')

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->


    <!--Inicio del modal actualizar-->
    <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">


                        {{csrf_field()}}

                        <input type="hidden" id="id_usuario" name="id_usuario" value="">

                        @include('usuario.form')

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->


    <!-- Inicio del modal Cambiar Estado del usuario -->
    <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado del Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST">

                        {{csrf_field()}}

                        <input type="hidden" id="id_usuario" name="id_usuario" value="">

                        <p>Estas seguro de cambiar el estado?</p>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                        </div>

                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Fin del modal Eliminar -->




</main>

@endsection