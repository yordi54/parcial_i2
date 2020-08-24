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

                <h2>Listado de Pedidos</h2><br />



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

                            <th>Ver Detalle</th>
                            <th>Cliente</th>
                            <th>Fecha Solicitada</th>
                            <th>Fecha Entregada </th>
                            <th>Total (USD$)</th>
                            <th>Estado</th>
                            

                        </tr>
                    </thead>
                    <tbody>


                        @foreach($pedidos as $ped)
                        <tr>
                            <td>

                                <a href="{{URL::action('OrderController@show',$ped->id)}}">
                                    <button type="button" class="btn btn-warning btn-md">
                                        <i class="fa fa-eye fa-2x"></i> Ver detalle
                                    </button> &nbsp;

                                </a>
                            </td>
                            <td>{{$ped->user->name}}</td>
                            <td>{{$ped->fecha_solicitada}}</td>
                            <td>{{$ped->fecha_entregada}}</td>
                            <td>{{$ped->monto_total}}</td>
                            <td>

                                @if($ped->estado == 'L')
                                <button type="button" class="btn btn-success btn-md" disabled>

                                    <i class="fa fa-check fa-2x"></i> Entregado
                                </button>
                                @endif

                                @if($ped->estado == 'E')
                                <button type="button" class="btn btn-danger btn-md">

                                    <i class="fa fa-check fa-2x"></i> Enviado
                                </button>
                                @endif

                                @if($ped->estado == 'P')
                                <button type="button" class="btn btn-danger btn-md">

                                    <i class="fa fa-check fa-2x"></i> En Proceso
                                </button>
                                @endif


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