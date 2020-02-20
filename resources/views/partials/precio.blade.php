<div class="form-group row">
  <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion: </label>
  <div class="col-md-6">
    <input type="number" name="precio" id="precio" min="{{$producto->precio_propuesto}}">
  </div>

</div>

<button type="button" name="button" onclick="consignarStore({{$producto->id}});" >Guardar</button>
