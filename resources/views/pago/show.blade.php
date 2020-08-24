@extends('principal')
@section('contenido')


<main class="main">

    <div class="card-body">

        <h2 class="text-center">Imagen Voucher</h2><br /><br /><br />

        <img src="{{ route('mostrar.voucher',['filename' => $pago->voucher])}}" alt="" width="500" height="500">
 

        


    </div>
    <!--fin del div card body-->
</main>

@endsection