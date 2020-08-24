@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">SISTEMA DE VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">

                <h2>Listado de Clientes</h2><br />


            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="GET" action="{{route('cliente.index')}}" id="buscador">
                            <div class="input-group">

                                <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="bg-primary">
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($clientes as $cli)

                            <tr>
                                <td>{{$cli->id}}</td>
                                <td>{{$cli->name}}</td>
                                <td>{{$cli->apellidos}}</td>
                                <td>{{$cli->direccion}}</td>
                                <td>{{$cli->email}}</td>
                                <td>

                                    <button type="button" class="btn btn-success btn-sm" disabled>
                                        <i class="fa fa-check fa-2x"></i> Activo
                                    </button>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>



</main>

@endsection