@extends('principal')
@section('contenido')


<main class="main">

  <div class="card-body">

    <h2 class="text-center">Detalle de Pedido</h2><br /><br /><br />


    <div class="form-group row">

      <div class="col-md-4">

        <label class="form-control-label" for="nombre">Cliente</label>

        <p>{{$pedidos->user->name}} {{$pedidos->user->apellidos}}</p>

      </div>

      <div class="col-md-4">

        <label class="form-control-label" for="">Documento CI</label>

        <p>{{$pedidos->user->ci}}</p>

      </div>

      <div class="col-md-4">
        <label class="form-control-label" for="">Número Factura</label>
        @foreach($ventas as $v)
        <p>{{$v->bill_id}}</p>
        @endforeach
      </div>

    </div>


    <br /><br />

    <div class="form-group row border">

      <h3>Detalle de Pedido</h3>

      <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-bordered table-striped table-sm">
          <thead>
            <tr class="bg-success">

              <th>Producto</th>

              <th>Descuento (USD$)</th>
              <th>Precio Unitario(USD$)</th>
              <th>Cantidad</th>
              <th>SubTotal (USD$)</th>
            </tr>
          </thead>

          <tfoot>


            <tr>
              @foreach($detalles as $det)
              <th colspan="4">
                <p align="right">TOTAL:</p>
              </th>
              <th>
                <p align="right">${{number_format($det->precio,2)}}</p>
              </th>
              @endforeach
            </tr>

            <tr>
              <th colspan="4">
                <p align="right">TOTAL IMPUESTO (20%):</p>
              </th>
              <th>
                <p align="right">$0</p>
              </th>
            </tr>

            <tr>
              <th colspan="4">
                <p align="right">TOTAL PAGAR:</p>
              </th>
              <th>
                <p align="right">${{number_format($pedidos->monto_total,2)}}</p>
              </th>
            </tr>
          </tfoot>

          <tbody>

            @foreach($detalles as $det)

            <tr>

              <td>{{$det->producto}}</td>

              <td>0</td>
              <td>${{$det->precio_u}}</td>
              <td>{{$det->cantidad}}</td>
              <td>${{$det->precio}}</td>


            </tr>


            @endforeach

          </tbody>


        </table>
      </div>


    </div>

  </div>
  <!--fin del div card body-->
</main>

@endsection