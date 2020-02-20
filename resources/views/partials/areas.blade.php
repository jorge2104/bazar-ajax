

<div class="container">
  <div class="row">
    <div class="col-md-4">Nombre</div>
    <div class="col-md-4">Descripcion</div>
    <div class="col-md-4">Acciones</div>
  </div>
  @csrf
  @foreach($areas as $area)
  <div class="row" style="color: #000">
    <div class="col-md-4"> <input type="text" id="Anombre-{{$area->id}}" value="{{$area->nombre}}" disabled> </div>
    <div class="col-md-4"> <input type="text" id="Adesc-{{$area->id}}"  value="{{$area->descripcion}}" disabled> </div>
    <div class="col-md-4">
      <div  id="actions-{{$area->id}}">
        @if($area->productos->count() ==  0)
        <a href="#" onclick="editarArea({{$area->id}})">Editar</a>
        <a href="#" onclick="eliminarArea({{$area->id}})">Eliminar</a>
        @else
        @if($area->activa ==  0)
        <a href="#" onclick="ActivarArea({{$area->id}})">Activar</a>
        @endif
        @if($area->activa ==  1)
        <a href="#" onclick="editarDescripcion({{$area->id}})">Editar</a>
        <a href="#" onclick="eliminarArea({{$area->id}})">Desactivar</a>
        @endif
        @endif
      </div>
      <div class="" id="update-{{$area->id}}" style="display: none;">
        <a href="#" onclick="updateArea({{$area->id}})">Guardar</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
