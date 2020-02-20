
<div class="form-group row">
  @csrf
  <label for="password" class="col-md-4 col-form-label text-md-right">Nueva contraseña</label>
  <div class="col-md-6">
    <input id="password" type="password" class="form-control" name="password" required>
  </div>
  <button type="button" name="button" class="btn btn-info" onclick="storePass({{$id}})">Guardar</button>
</div>
