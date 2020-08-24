    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
        <div class="col-md-9">
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el Nombre" >

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="apellidos">Apellidos</label>
        <div class="col-md-9">
            <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Ingrese los Apellidos" >

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="ci">CI</label>
        <div class="col-md-9">
            <input type="number" id="ci" name="ci" class="form-control" placeholder="Ingrese su carnet" >

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="direccion">Dirección</label>
        <div class="col-md-9">
            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección" >
        </div>
    </div>



    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="celular">Celular</label>
        <div class="col-md-9">

            <input type="number" id="celular" name="celular" class="form-control" >

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="fecha">Fecha_Nacimiento</label>
        <div class="col-md-9">

            <input type="date" id="fecha" name="fecha" class="form-control" >

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="email">Email</label>
        <div class="col-md-9">

            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo">

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="password">Password</label>
        <div class="col-md-9">

            <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese el password" required>

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="id_rol">Rol</label>

        <div class="col-md-9">

            <select class="form-control" name="id_rol" id="id_rol">

                <option value="0" disabled>Seleccione</option>

                @foreach($roles as $rol)
                @if($rol->id !=5)
                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                @endif
                @endforeach

            </select>

        </div>

    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="imagen">Foto</label>
        <div class="col-md-9">

            <input type="file" id="imagen" name="imagen" class="form-control">

        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>

    </div>