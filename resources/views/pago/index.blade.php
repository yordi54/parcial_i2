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

                <h2>Listado de Pagos</h2><br />



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
                            <th>Monto (USD$)</th>
                            <th>Tipo de Pago</th>
                            <th>Voucher</th>
                            <th>Estado</th>
                            <th>Confirmar Pago</th>


                        </tr>
                    </thead>
                    <tbody>


                        @foreach($pagos as $pag)
                        <tr>

                            <td>{{$pag->order_id}}</td>
                            <td>{{$pag->order->user->name}} {{$pag->order->user->apellidos}}</td>
                            <td>{{$pag->fecha}}</td>
                            <td>{{$pag->monto}}</td>
                            <td>{{$pag->tipo_pago}}</td>
                            @if($pag->tipo_pago != 'Presencial')
                            <td>
                                <a href="{{route('pago.voucher',['id' => $pag->id])}}">
                                    <button type="button" class="btn btn-warning btn-md">
                                        <i class="fa fa-eye fa-2x"></i> Ver Voucher
                                    </button> &nbsp;

                                </a>
                            </td>
                            @else
                            <td>NULL</td>
                            @endif
                            @if($pag->estado == 0)
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="fa fa-money fa-2x"></i> No Pagado
                                </button>

                            </td>
                            @else
                            <td>

                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="fa fa-money fa-2x"></i> Pagado
                                </button>

                            </td>
                            @endif
                            <td>


                                <button type="button" class="btn btn-success btn-sm" data-id_pago="{{$pag->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-money  fa-2x"></i> Confirmar
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal cambiar estado-->
    <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmar Pago</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('pago.destroy','test')}}" method="post" class="form-horizontal">
                        {{method_field('delete')}}

                        {{csrf_field()}}
                        <input type="hidden" id="id_pago" name="id_pago" value="" />


                        <p>Estas seguro de confirmar el pago?</p>


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