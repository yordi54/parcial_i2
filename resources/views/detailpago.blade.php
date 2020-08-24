@extends('layouts.app')
@section('content')
<!--INFORMACION DEL CARRITO-->

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>
                        Nro
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
                        Tipo Pago
                    </th>
                    <th>
                        Voucher
                    </th>

                    <th>
                        Agregar Voucher
                    </th>
                </tr>
            </thead>
            <?php $ca = 0 ?>
            @foreach($pagos as $pag)
            <?php $ca++ ?>
            <tr>
                <th>
                    {{$ca}}
                </th>
                <th>
                    @if($pag->estado == '0')
                    <button type="button" class="btn btn-danger btn-sm" disabled>
                        <i class="fa fa-unlock fa-2x"></i> No pagado
                    </button>
                    @endif
                    @if($pag->estado == '1')
                    <button type="button" class="btn btn-success btn-sm" disabled>
                        <i class="fa fa-check fa-2x"></i> Pagado
                    </button>
                    @endif
                </th>
                <th>
                    {{$pag->fecha}}
                </th>
                <th>
                    {{$pag->monto}}
                </th>


                <th>
                    {{$pag->tipo_pago}}

                </th>
                <th>
                    <img src="{{ route('imagen.voucher',['filename' => $pag->voucher])}}" alt="" width="100" height="100">
                </th>
                <th>
                    @if($pag->tipo_pago == 'Banco')
                        @if(empty($pag->voucher))
                        <form action="{{route('voucher.pago')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="usuario" value="{{$pag->id}}" >
                            <input type="file" name="voucher" id="voucher">
                            <input type="submit" class="btn btn-primary" value="subir">
                        </form>
                        @else
                            <h4>Voucher Subido</h4>
                        @endif
                    @endif

                </th>
            </tr>
            @endforeach

        </table>

    </div>

</div>


<!--FIN DE INFORMACION DEL CARRITO-->

@endsection