@extends('layouts.app')
@section('content')
<!--INFORMACION DEL CARRITO-->

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>
                        Pedido
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Monto Total
                    </th>

                    <th>
                        Ver factura
                    </th>
                    <th>
                        Pago
                    </th>
                </tr>
            </thead>


            <?php $cont = 0 ?>


            @foreach($pedidos as $ped)
            <?php $cont++ ?>


            <tr>
                <th>
                    {{$cont}}
                </th>
                <th>
                    @if($ped->estado == 'P')
                    <button type="button" class="btn btn-danger btn-sm" disabled>
                        <i class="fa fa-unlock fa-2x"></i> En Proceso
                    </button>
                    @endif
                    @if($ped->estado == 'E')
                    <button type="button" class="btn btn-danger btn-sm" disabled>
                        <i class="fa fa-unlock fa-2x"></i> Enviado
                    </button>
                    @endif
                    @if($ped->estado == 'L')
                    <button type="button" class="btn btn-success btn-sm" disabled>
                        <i class="fa fa-check fa-2x"></i> Entregado
                    </button>
                    @endif
                </th>
                <th>
                    {{$ped->fecha_solicitada}}
                </th>
                <th>
                    ${{$ped->monto_total}}
                </th>


                <th>
                    <a href="{{url('listarPedidosPdf',$ped->id)}}" target="_blank">

                        <button type="button" class="btn btn-info btn-sm">

                            <i class="fa fa-file fa-2x"></i> FACTURA
                        </button> &nbsp;

                    </a>
                </th>
                <th>
                    <a href="{{route('detail.pago',['id' => $ped->id])}}" class="btn btn-primary" role="button">Pago</a>
                </th>
            </tr>
            @endforeach

        </table>

    </div>

</div>


<!--FIN DE INFORMACION DEL CARRITO-->

@endsection