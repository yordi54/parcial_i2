
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="pedido">Pedido</label>
    <div class="col-md-9">
        <input type="number" name="pedido" id="pedido" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="usuario">Usuario</label>

    <div class="col-md-9">

        <select class="form-control" name="usuario" id="usuario" required>

            <option value="0" disabled>Seleccione</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>

    </div>

</div>


<div class="form-group row">
    <label class="col-md-3 form-control-label" for="">Cargo($USD)</label>
    <div class="col-md-9">
        <input type="number" name="" id="" class="form-control" value="5" >
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>

</div>