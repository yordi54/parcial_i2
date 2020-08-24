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

                <h2>Listado de Entregas</h2><br />
                @if(Auth::user()->role_id != 2)
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Entrega
                </button>
                @endif


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
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">

                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Fecha </th>
                            <th> Direccion </th>
                            <th>Cargo (USD$)</th>
                            <th>Estado</th>


                        </tr>
                    </thead>
                    <tbody>
                    @if(Auth::user()->role_id == 1)
                        @foreach($entregas as $ent)
                            
                            <tr>

                                <td>{{$ent->order_id}}</td>
                                <td>{{$ent->order->user->name}} {{$ent->order->user->apellidos}}</td>
                                <td>{{$ent->created_at}}</td>
                                <td>{{$ent->order->user->direccion}}</td>
                                <td>{{$ent->cargo}}</td>
                                <td>


                                    <button type="button" class="btn btn-success btn-sm" data-id_entrega="{{$ent->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                        <i class="fa fa-truck  fa-2x"></i> Entregado
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else

                        @foreach($entregas as $ent)
                            @if(Auth::user()->id == $ent->user_id)
                                <tr>

                                    <td>{{$ent->order_id}}</td>
                                    <td>{{$ent->order->user->name}} {{$ent->order->user->apellidos}}</td>
                                    <td>{{$ent->created_at}}</td>
                                    <td>{{$ent->order->user->direccion}}</td>
                                    <td>{{$ent->cargo}}</td>
                                    <td>


                                        <button type="button" class="btn btn-success btn-sm" data-id_entrega="{{$ent->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-truck  fa-2x"></i> Entregado
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Entrega</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('entrega.store')}}" method="post" class="form-horizontal">

                        {{csrf_field()}}
                        @include('entrega.form')


                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal agregar categoria-->

    <!--Inicio del modal cambiar estado-->
    <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmar Entrega</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('entrega.destroy','test')}}" method="post" class="form-horizontal">
                        {{method_field('delete')}}

                        {{csrf_field()}}
                        <input type="hidden" id="id_entrega" name="id_entrega" value="" />


                        <p>Estas seguro de confirmar la entrega?</p>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-2x"></i>Aceptar</button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal cambiar estado-->
</main>
@endsection