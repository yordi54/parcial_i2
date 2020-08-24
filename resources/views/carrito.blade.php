@extends('layouts.app')
@section('content')
<!--INFORMACION DEL CARRITO-->
<?php $valor = 0 ?>
<?php $q = 0 ?>
@if(session('cart'))

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>
                        Producto
                    </th>
                    <th>
                        Precio Unitario
                    </th>
                    <th>
                        Cantidad
                    </th>
                    <th>
                        Actualizar
                    </th>
                    <th>
                        Precio Total
                    </th>
                    <th>
                        Foto
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>

            @foreach(session('cart') as $id => $details)
            <?php $valor += $details['price'] * $details['quantity'] ?>
            <?php $q++ ?>
            <tr>
                <th>
                    {{$details['name']}}
                </th>
                <th>
                    {{$details['price']}}
                </th>
                <th>
                    {{$details['quantity']}}
                </th>
                <th>
                <a href="{{ route('add.carrito',['id' => $details['id'] ]) }}" class="btn btn-primary" role="button">Mas Cantidad</a>

                </th>
                <th>
                    {{$details['price']* $details['quantity']}}
                </th>
                <th>
                    <img src="{{ route('imagen.show',['filename' => $details['photo']]) }}" alt="" width="100" height="100">
                </th>

                <th>
                    <a href="{{ route('eliminar.prod',['id' => $details['id'] ]) }}" class="btn btn-primary" role="button">Eliminar</a>
                </th>
            </tr>
            @endforeach


        </table>

    </div>
    <div class="cart-summary right">
        <small>{{$q}} Item(s) seleccionado</small>
        <h5>SUBTOTAL: ${{$valor}}</h5>
        @guest
            <h5><strong>Registrate para pagar!!</strong> </h5>
        @else
            <a href="{{ route('pag') }}" class="btn btn-primary" role="button">Pagar</a>
        @endguest
    </div>
</div>

@endif
<!--FIN DE INFORMACION DEL CARRITO-->

@endsection