@extends('layouts.app')
@section('content')

<div class="container ">
    <div class="card">
        <div class="card-header">
            <h1>Perfil</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('perfil.editar') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellidos" placeholder="Ingrese su apellido" value="{{Auth::user()->apellidos}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono">Telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="{{Auth::user()->celular}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ci">CI</label>
                        <input type="number" class="form-control" name="ci" id="ci" value="{{Auth::user()->ci}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="1234 Main St" value="{{Auth::user()->direccion}}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{Auth::user()->ciudad}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fecha">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{Auth::user()->fecha_nacimiento}}">
                    </div>
                    
                </div>
                
                <div class="form-group">

                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>

</div>
@endsection