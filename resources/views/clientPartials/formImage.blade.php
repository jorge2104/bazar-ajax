<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar imagen</div>
        <div class="card-body">
          <form method="POST" action="{{ route('Fotos.store', $id) }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group row">
              <label for="fotos" class="col-md-4 col-form-label text-md-right">Fotos: </label>
              <div class="col-md-6">
                <input type="file" name="fotos[]" class="form-control" multiple required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary"> Guardar </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
