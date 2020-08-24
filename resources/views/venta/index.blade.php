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

                <h2>Listado de Ventas</h2><br />
                <a href="{{url('listarVentasPdf')}}" target="_blank">

                    <button type="button" class="btn btn-info btn-sm">

                        <i class="fa fa-file fa-2x"></i> REPORTE VENTA
                    </button> &nbsp;

                </a>


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
                            <th>Nro Factura</th>
                            <th>Cliente</th>
                            <th>Fecha </th>
                            <th>Total (USD$)</th>
                            <th>Estado</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach($ventas as $ven)
                        <tr>
                            <td>{{$ven->order_id}}</td>
                            <td>{{$ven->bill_id}}</td>
                            <td>{{$ven->order->user->name}} {{$ven->order->user->apellidos}}</td>
                            <td>{{$ven->fecha}}</td>
                            <td>{{$ven->monto}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-md" disabled>

                                    <i class="fa fa-cart-arrow-down fa-2x"></i> Vendido
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





</main>
@endsection