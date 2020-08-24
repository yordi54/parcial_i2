@extends('layouts.app')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <form method="POST" action="{{ route('perfil.pago') }}">
                    @csrf
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Informacion de Envío</h3>
                        </div>

                        <div class="form-group">
                            <label for="nombre"> Nombre</label>
                            <input class="input" type="text" name="nombre" value="{{Auth::user()->name}}" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="nombre"> Apellidos</label>
                            <input class="input" type="text" name="apellidos" value="{{Auth::user()->apellidos}}" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <label for="nombre"> Email</label>
                            <input class="input" type="email" name="email" value="{{Auth::user()->email}}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="nombre"> Direccion</label>
                            <input class="input" type="text" name="direccion" value="{{Auth::user()->direccion}}" placeholder="Direccion">
                        </div>
                        <div class="form-group">
                            <label for="nombre"> Ciudad</label>
                            <input class="input" type="text" name="ciudad" value="{{Auth::user()->ciudad}}" placeholder="Ciudad">
                        </div>

                        <div class="form-group">
                            <label for="nombre"> Telefono</label>
                            <input class="input" type="number" name="telefono" value="{{Auth::user()->celular}}" placeholder="Telefono">
                        </div>

                    </div>
                    <!-- /Billing Details -->

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Tu Pedido</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT0</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        <?php $total = 0 ?>
                        <?php $pr = 0?>
                        @foreach(session('cart') as $id => $details)
                        <?php $total += $details['price'] * $details['quantity'] ?>
                        <?php $pr =$details['price'] * $details['quantity'] ?>
                        <div class="order-col">
                            <div>{{$details['quantity']}}x {{$details['name']}}</div>
                            <div><strong>${{$pr}}</strong></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="order-col">
                        <div><strong>Envio</strong></div>
                        <div><strong>$5</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">${{$total+5}}</strong></div>
                    </div>
                </div>
                <form action="{{ route('pagar.producto') }}" method="POST">
                    @csrf
                    <select name="pago" id ="pago" >
                        <option value="Banco" >Transferencia Bancaria</option>
                        <option value="Presencial" > Pago Presencial</option>
                    </select>

                    <button type="submit" class="primary-btn order-submit">Pagar Pedido</button>
                </form>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection