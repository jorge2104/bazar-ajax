<form method="POST" action="{{ route('Fotos.actualizar', $foto->id) }}" enctype="multipart/form-data" >
  @csrf
  {{$foto->id}}
  <div class="form-group row">
    <label for="fotos" class="col-md-4 col-form-label text-md-right">Fotos: </label>
    <div class="col-md-6">
      <input type="file" name="fotos" class="form-control" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-12 text-right">
      <button type="submit" class="btn btn-primary"> Guardar </button>
    </div>
  </div>
</form>
