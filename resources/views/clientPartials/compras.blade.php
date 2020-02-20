<div class="container">
  <div class="row">
    @foreach($compras as $compra)
    <div class="col-md-4 p-2">
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Producto: {{$compra->producto->descripcion}}</li>
          <li class="list-group-item">Precio de venta: {{$compra->precio_venta}} </li>
          <li class="list-group-item">Comprador: {{$compra->quien_compra->name}}</li>
          <li class="list-group-item">Fecha: {{$compra->fecha}}</li>
        </ul>
      </div>
    </div>
    @endforeach
  </div>

</div>
