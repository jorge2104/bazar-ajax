<div class="container">
  <div class="row">
    @foreach($pendientes as $pendiente)
    <div class="col-md-4 p-2">
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">fecha: {{$pendiente->fecha}}</li>
          <li class="list-group-item">monto: {{$pendiente->monto}} </li>
          <button type="button" name="button" onclick="entregarPago({{$pendiente->id}})">Entregar</button>
        </ul>
      </div>
    </div>
    @endforeach

  </div>
<div class="row">
  @foreach($entregados as $entregado)
  <div class="col-md-4 p-2">
    <div class="card">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">fecha: {{$entregado->fecha}}</li>
        <li class="list-group-item">monto: {{$entregado->monto}} </li>
      </ul>
    </div>
  </div>
  @endforeach
</div>
