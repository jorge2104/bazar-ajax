<form method="POST" action="{{ route('Productos.store') }}" enctype="multipart/form-data" id="newProduct" >
            @csrf
            <div class="form-group row">
              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion: </label>
              <div class="col-md-6">
                <textarea name="descripcion" class="form-control" id="descripcion" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="area" class="col-md-4 col-form-label text-md-right">Area: </label>
              <div class="col-md-6">
                <select class="form-control" name="area" required>
                  @foreach($areas as $area)
                  <option value="{{$area->id}}" >{{$area->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="fotos" class="col-md-4 col-form-label text-md-right">Fotos: </label>
              <div class="col-md-6">
                <input type="file" name="fotos[]" class="form-control" multiple required>
              </div>
            </div>
            <div class="form-group row">
              <label for="disponibles" class="col-md-4 col-form-label text-md-right">Disponibles: </label>
              <div class="col-md-6">
                <input type="number" name="disponibles" class="form-control" id="disponibles" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="precio_propuesto" class="col-md-4 col-form-label text-md-right">Precio: </label>
              <div class="col-md-6">
                <input type="number" name="precio_propuesto" class="form-control" id="precio" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary submitBtn"> Guardar </button>
              </div>
            </div>
          </form>
