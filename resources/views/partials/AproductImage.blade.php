
<div class="container">
  @foreach($producto->fotos as $imagen)
  <div class="col-md-4">
    <img src="{{$imagen->path}}" alt="" class="img-fluid">
    @if($producto->consignado == 0)
    <button type="button" name="button" class="btn btn-info" onclick="deleteFoto({{$imagen->id}});">Eliminar</button>
    <button type="button" name="button" class="btn btn-info" onclick="editFoto({{$imagen->id}});">Editar</button>
    @endif
  </div>
  @endforeach
  <div class="row text-center">
    @if(Auth::user()->id_role == 1)
    <button type="button" name="button" class="btn btn-info" onclick="getProductosAdmin2();">volver</button>
    @endif
    @if(Auth::user()->id_role == 2  )
    <button type="button" name="button" class="btn btn-info" onclick="getProductos2();">volver</button>
    <button type="button" name="button" class="btn btn-info" onclick="imageForm({{$producto->id}});">Añadir imagen</button>
    @endif

  </div>
</div>
