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

                <h2>Listado de Roles</h2><br />



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

                            <th>Rol</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            

                        </tr>
                    </thead>
                    <tbody>

                    @foreach($roles as $rol)
                        <tr>     
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->nombre}}</td>
                         
                            <td>
                                <button type="button" class="btn btn-success btn-md" disabled>

                                    <i class="fa fa-check fa-2x"></i> Activo
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