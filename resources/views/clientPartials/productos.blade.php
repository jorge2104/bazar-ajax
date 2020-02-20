@foreach($productos as $producto)
<div class="col-md-4">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"> <input type="text" name="descripcion-{{$producto->id}}" id="descripcion-{{$producto->id}}" value="{{$producto->descripcion}}" disabled> </h5>
      <p class="card-text">
        Precio propuesto:   $  <input type="number" name="precio_propuesto" id="precio_propuesto-{{$producto->id}}" value="{{$producto->precio_propuesto}}" disabled> <br>
        Disponible: <input type="number" name="disponibles" id="disponibles-{{$producto->id}}" value="{{$producto->disponibles}}" disabled>  <br>
      </p>
      <div class="row">
        <select class="form-control" name="area" id="area-{{$producto->id}}" disabled>
          @foreach($areas as $area)
          <option value="{{$area->id}}" @if($producto->area == $area->id)selected @endif> {{$area->nombre}}</option>
          @endforeach
        </select>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          @if($producto->consignado == 0)
          <button type="button" name="button" onclick="editarProducto({{$producto->id}});" id="editar-{{$producto->id}}">Editar</button> <br>
          <button type="button" name="button" onclick="updateProduct({{$producto->id}});" id="editSave-{{$producto->id}}" style="display: none;" >Guardar</button>
          <button type="button" name="button" onclick="deleteProducto({{$producto->id}});" >Eliminar</button>

          @endif
          @if($producto->consignado == 1)
          <h5>Consignado</h5>
          @endif
          <button type="button" name="button" onclick="getImages({{$producto->id}})">Ver imagenes</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

<div class="row">
  <button type="button" name="button" class="btn btn-info" onclick="getFormProduct();"> Agregar producto </button>
</div>
