@csrf
<div class="form-group row">
  <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre: </label>
  <div class="col-md-6">
    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
  </div>
</div>
<div class="form-group row">
  <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion: </label>
  <div class="col-md-6">
    <textarea name="descripcion" class="form-control" id="descripcion"></textarea>
  </div>
</div>

<div class="modal-footer mt-2">
  <button class="btn btn-primary" type="button" name="button" onclick="guardarArea();"> Guardar</button>
</div>
