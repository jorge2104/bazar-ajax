@foreach($areas as $area)
<h5>{{$area->name}}</h5>
@foreach($area->productos as $producto)
<div class="col-md-4">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$producto->descripcion}}</h5>
      <p class="card-text">
        Precio propuesto:   ${{$producto->precio_propuesto}}<br>
        Disponible:{{$producto->disponibles}}<br>
      </p>
      <div class="row">
        <div class="col-md-12 text-center">
          @if($producto->consignado == 0)
          <button type="button" name="button" onclick="consignar({{$producto->id}});">Consignar</button> <br>
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
@endforeach

<script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
